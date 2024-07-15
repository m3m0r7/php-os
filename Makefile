DIST_PATH = ./dist
IMG = $(DIST_PATH)/php-os.img
BOOT_BIN = $(DIST_PATH)/boot.bin

all: $(IMG)

$(DIST_PATH)/php-os.img: $(BOOT_BIN) $(KERNEL_BIN)
	dd if=$(BOOT_BIN) of=$(IMG) conv=notrunc

$(DIST_PATH)/boot.bin: boot.asm
	nasm -f bin ./dist/boot.asm -o $(BOOT_BIN)

clean:
	rm -f $(IMG) $(BOOT_BIN)

.PHONY: clean all
