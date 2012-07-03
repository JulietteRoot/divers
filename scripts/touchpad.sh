#!/bin/bash
xinput set-int-prop "PS/2 Synaptics TouchPad" "Evdev Wheel Emulation" 8 1
xinput set-int-prop "PS/2 Synaptics TouchPad" "Evdev Wheel Emulation Button" 8 3
xinput set-int-prop "PS/2 Synaptics TouchPad" "Evdev Wheel Emulation Timeout" 16 200
xinput set-int-prop "PS/2 Synaptics TouchPad" "Evdev Wheel Emulation Axes" 8 6 7 4 5

