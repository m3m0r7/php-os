# PHP-OS

The PHP-OS is implemented an Operating System written in PHP.
This is **not an emulator** for architectures (e.g. i386, x86_64 and so on).
This is making an assembly or image file directly for an operating system.

Moreover, this is very ultra hyper maximum experimental implementation.

## Requirements

- PHP 8.3+
- qemu
- nasm

## Notice

In currently status, this project only implements  **Intel x86_64** architecture.
But you can try this architecture with using QEMU on aarch (macOS M1, M2).

## Quick Start

1. Install PHP-OS via composer.

```
$ composer require m3m0r7/php-os
```

2. Write an example code as `HelloWorld.php` as following.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$bootloader = new \PHPOS\Bootloader\Bootloader(
    new \PHPOS\Architecture\Architecture(
        // Use x86_64 architecture
        \PHPOS\Architecture\ArchitectureType::x86_64,
    ),
    new \PHPOS\Bootloader\Option(
        new \PHPOS\Bootloader\IO(),
    ),
);

// Set variable for printing BIOS screen
$bootloader->architecture()->runtime()
    ->setVariable('hello_world', 'Hello World!');

// Initialize bootloader
$bootloader
    // Print Hello World into BIOS screen
    ->registerInitializationService(\PHPOS\Service\HelloWorld::class)

    // Enable Print String service
    ->registerInitializationService(\PHPOS\Service\PrintString::class)

    // Fill with null to 510 bytes and add magic bytes into last in bootloader
    ->registerPostService(\PHPOS\Service\EndOfBootLoader::class)

    // Bridge to assembler
    ->assemble()

    // Save as a boot.asm file
    ->saveAsReadable(
        // Specify save path
        new \PHPOS\Stream\File(fopen(__DIR__ . '/boot.asm', 'w+')),

        // Or save to on-memory.
        // new \PHPOS\Stream\Memory(),
    );
```

3. Make `boot.bin` as an image file for bootloader with nasm command as following.

```
$ nasm -f bin boot.asm -o boot.bin
```

4. Start QEMU with qemu command as following.
```
$ qemu-system-x86_64 -drive file=boot.bin,format=raw
```

5. Show figure as following if you successfully to run the QEMU.

<img src="./doc/demo.png" width="100%">

## Test

```
$ ./vendor/bin/phpunit tests/
```

## Linting

```
$ ./vendor/bin/php-cs-fixer fix src/ tests/
```

## License

MIT
