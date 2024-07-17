<?php

declare(strict_types=1);

namespace PHPOS\OS\Bundler;

use PHPOS\OS\AssemblerType;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\ConfigureOptionInterface;
use PHPOS\OS\OSInfo;
use PHPOS\Utility\AutomaticallyGeneratedFileSignature;

class Bundler
{
    private const ASSEMBLY_DIRECTORY = 'asm';
    private const DISTRIBUTION_DIRECTORY = 'dist';
    private const BUILD_DIRECTORY = 'build';

    public function __construct(protected ConfigureOptionInterface $configureOption)
    {

    }

    public function distribute(): void
    {
        @mkdir(
            $asmDirectory = $this->configureOption->distributionDirectory() . '/' . self::ASSEMBLY_DIRECTORY,
            recursive: true,
        );

        @mkdir(
            $distDirectory = $this->configureOption->distributionDirectory() . '/' . self::DISTRIBUTION_DIRECTORY,
            recursive: true,
        );

        @mkdir(
            $buildDirectory = $this->configureOption->distributionDirectory() . '/' . self::BUILD_DIRECTORY,
            recursive: true,
        );

        $makeFile = '';

        $handle = fopen(
            $this->configureOption->distributionDirectory() . '/' . $this->configureOption->makeFileName(),
            'w+',
        );

        foreach ($this->configureOption->codes() as $sector => $code) {
            assert($code instanceof CodeInterface);
            $code->setSector(
                OSInfo::DEFAULT_SECTOR_START + $sector,
            );
        }

        $codes = [
            $this->configureOption->bootloader(),
            ...$this->configureOption->codes(),
        ];

        // Create assembly files
        foreach ($codes as $code) {
            assert($code instanceof CodeInterface);
            $asmHandle = fopen(
                $asmDirectory . '/' . $code->name() . '.asm',
                'w+'
            );
            fwrite($asmHandle, $code->assemble()->asText());
            fclose($asmHandle);
        }

        $fileNames = [];

        $makeFile .= 'EXTENSION_NAME=' . $this->configureOption->compiledExtensionName() . "\n";
        $makeFile .= 'ASM_PATH=' . $asmDirectory . "\n";
        $makeFile .= 'DIST_PATH=' . $distDirectory . "\n";
        $makeFile .= 'OS_IMAGE=' . $buildDirectory . '/' . $this->configureOption->OSImageFileName() . "\n";
        $makeFile .= 'FILE_PATHS=';

        $filePaths = [];
        foreach ($codes as $code) {
            assert($code instanceof CodeInterface);
            $fileNames[] = $fileName = $code->name();

            $filePaths[] = '$(DIST_PATH)/' . $fileName  . '.$(EXTENSION_NAME)';
        }
        $makeFile .= implode(' ', $filePaths);
        $makeFile .= "\n";
        $makeFile .= "\n";

        foreach ($fileNames as $basedFileName) {
            $makeFile .= "$(DIST_PATH)/{$basedFileName}.$(EXTENSION_NAME): $(ASM_PATH)/{$basedFileName}.asm\n";
            $makeFile .= "\t" . $this->assembleCommand(
                "$(ASM_PATH)/{$basedFileName}.asm",
                "$(DIST_PATH)/{$basedFileName}.$(EXTENSION_NAME)",
            );
            $makeFile .= "\n";
        }

        $makeFile .= "\n";

        // Add dd recipe
        $makeFile .= "$(OS_IMAGE): $(FILE_PATHS)\n";
        foreach ($fileNames as $i => $fileName) {
            $makeFile .= "\t" . $this->transferCommand(
                "$(DIST_PATH)/{$fileName}.$(EXTENSION_NAME)",
                '$(OS_IMAGE)',
                $i,
            );
            $makeFile .= "\n";
        }
        $makeFile .= "\n";

        // Add clean recipe
        $makeFile .= "clean:\n";
        $makeFile .= "\t\\rm -f $(OS_IMAGE) $(FILE_PATHS)\n";

        // Add all recipe
        $makeFile .= "all: $(OS_IMAGE) $(FILE_PATHS)\n";

        // Add .PHONY
        $makeFile .= ".PHONY: clean all\n";

        fwrite($handle, AutomaticallyGeneratedFileSignature::createHeader('#') . $makeFile);
        fclose($handle);
    }

    protected function transferCommand(string $from, string $to, int $seek = 0): string
    {
        return sprintf(
            "\\dd if=%s of=%s seek=%d conv=notrunc",
            $from,
            $to,
            $seek,
        );
    }

    protected function assembleCommand(string $from, string $to): string
    {
        return match ($this->configureOption->usingAssemblerType()) {
            AssemblerType::NASM => sprintf('\nasm -f bin %s -o %s', $from, $to),
        };
    }
}
