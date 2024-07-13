DIST_PATH = ./dist
IMG = $(DIST_PATH)/php-os.img
BOOT_BIN = $(DIST_PATH)/boot.bin
KERNEL_BIN = $(DIST_PATH)/kernel.bin

all: $(IMG)

$(DIST_PATH)/php-os.img: $(BOOT_BIN) $(KERNEL_BIN)
	dd if=/dev/zero of=$(IMG) bs=512 count=100
	dd if=$(BOOT_BIN) of=$(IMG) conv=notrunc
	dd if=$(KERNEL_BIN) of=$(IMG) seek=1 conv=notrunc

$(DIST_PATH)/boot.bin: boot.asm
	nasm -f bin boot.asm -o $(BOOT_BIN)

$(DIST_PATH)/kernel.bin: kernel.asm
	nasm -f bin kernel.asm -o $(KERNEL_BIN)

clean:
	rm -f $(IMG) $(BOOT_BIN) $(KERNEL_BIN)

.PHONY: clean all
