<?php

/* ***********************************************************
 * This file was automatically generated on 2021-05-06.      *
 *                                                           *
 * PHP Bindings Version 2.1.29                               *
 *                                                           *
 * If you have a bugfix for this file and want to commit it, *
 * please fix the bug in the generator. You can find a link  *
 * to the generators git repository on tinkerforge.com       *
 *************************************************************/

namespace Tinkerforge;

/**
 * @internal
 */
function getDeviceDisplayName($device_identifier)
{
	switch ($device_identifier) {
	case 11: return 'DC Brick';
	case 13: return 'Master Brick';
	case 14: return 'Servo Brick';
	case 15: return 'Stepper Brick';
	case 16: return 'IMU Brick';
	case 17: return 'RED Brick';
	case 18: return 'IMU Brick 2.0';
	case 19: return 'Silent Stepper Brick';
	case 21: return 'Ambient Light Bricklet';
	case 23: return 'Current12 Bricklet';
	case 24: return 'Current25 Bricklet';
	case 25: return 'Distance IR Bricklet';
	case 26: return 'Dual Relay Bricklet';
	case 27: return 'Humidity Bricklet';
	case 28: return 'IO-16 Bricklet';
	case 29: return 'IO-4 Bricklet';
	case 111: return 'HAT Brick';
	case 112: return 'HAT Zero Brick';
	case 210: return 'Joystick Bricklet';
	case 211: return 'LCD 16x2 Bricklet';
	case 212: return 'LCD 20x4 Bricklet';
	case 213: return 'Linear Poti Bricklet';
	case 214: return 'Piezo Buzzer Bricklet';
	case 215: return 'Rotary Poti Bricklet';
	case 216: return 'Temperature Bricklet';
	case 217: return 'Temperature IR Bricklet';
	case 218: return 'Voltage Bricklet';
	case 219: return 'Analog In Bricklet';
	case 220: return 'Analog Out Bricklet';
	case 221: return 'Barometer Bricklet';
	case 222: return 'GPS Bricklet';
	case 223: return 'Industrial Digital In 4 Bricklet';
	case 224: return 'Industrial Digital Out 4 Bricklet';
	case 225: return 'Industrial Quad Relay Bricklet';
	case 226: return 'PTC Bricklet';
	case 227: return 'Voltage/Current Bricklet';
	case 228: return 'Industrial Dual 0-20mA Bricklet';
	case 229: return 'Distance US Bricklet';
	case 230: return 'Dual Button Bricklet';
	case 231: return 'LED Strip Bricklet';
	case 232: return 'Moisture Bricklet';
	case 233: return 'Motion Detector Bricklet';
	case 234: return 'Multi Touch Bricklet';
	case 235: return 'Remote Switch Bricklet';
	case 236: return 'Rotary Encoder Bricklet';
	case 237: return 'Segment Display 4x7 Bricklet';
	case 238: return 'Sound Intensity Bricklet';
	case 239: return 'Tilt Bricklet';
	case 240: return 'Hall Effect Bricklet';
	case 241: return 'Line Bricklet';
	case 242: return 'Piezo Speaker Bricklet';
	case 243: return 'Color Bricklet';
	case 244: return 'Solid State Relay Bricklet';
	case 246: return 'NFC/RFID Bricklet';
	case 249: return 'Industrial Dual Analog In Bricklet';
	case 250: return 'Accelerometer Bricklet';
	case 251: return 'Analog In Bricklet 2.0';
	case 253: return 'Load Cell Bricklet';
	case 254: return 'RS232 Bricklet';
	case 255: return 'Laser Range Finder Bricklet';
	case 256: return 'Analog Out Bricklet 2.0';
	case 258: return 'Industrial Analog Out Bricklet';
	case 259: return 'Ambient Light Bricklet 2.0';
	case 260: return 'Dust Detector Bricklet';
	case 262: return 'CO2 Bricklet';
	case 263: return 'OLED 128x64 Bricklet';
	case 264: return 'OLED 64x48 Bricklet';
	case 265: return 'UV Light Bricklet';
	case 266: return 'Thermocouple Bricklet';
	case 267: return 'Motorized Linear Poti Bricklet';
	case 268: return 'Real-Time Clock Bricklet';
	case 270: return 'CAN Bricklet';
	case 271: return 'RGB LED Bricklet';
	case 272: return 'RGB LED Matrix Bricklet';
	case 276: return 'GPS Bricklet 2.0';
	case 277: return 'RS485 Bricklet';
	case 278: return 'Thermal Imaging Bricklet';
	case 279: return 'XMC1400 Breakout Bricklet';
	case 282: return 'RGB LED Button Bricklet';
	case 283: return 'Humidity Bricklet 2.0';
	case 284: return 'Industrial Dual Relay Bricklet';
	case 285: return 'DMX Bricklet';
	case 286: return 'NFC Bricklet';
	case 288: return 'Outdoor Weather Bricklet';
	case 289: return 'Remote Switch Bricklet 2.0';
	case 290: return 'Sound Pressure Level Bricklet';
	case 291: return 'Temperature IR Bricklet 2.0';
	case 292: return 'Motion Detector Bricklet 2.0';
	case 293: return 'Industrial Counter Bricklet';
	case 294: return 'Rotary Encoder Bricklet 2.0';
	case 295: return 'Analog In Bricklet 3.0';
	case 296: return 'Solid State Relay Bricklet 2.0';
	case 297: return 'Air Quality Bricklet';
	case 298: return 'LCD 128x64 Bricklet';
	case 299: return 'Distance US Bricklet 2.0';
	case 2100: return 'Industrial Digital In 4 Bricklet 2.0';
	case 2101: return 'PTC Bricklet 2.0';
	case 2102: return 'Industrial Quad Relay Bricklet 2.0';
	case 2103: return 'LED Strip Bricklet 2.0';
	case 2104: return 'Load Cell Bricklet 2.0';
	case 2105: return 'Voltage/Current Bricklet 2.0';
	case 2106: return 'Real-Time Clock Bricklet 2.0';
	case 2107: return 'CAN Bricklet 2.0';
	case 2108: return 'RS232 Bricklet 2.0';
	case 2109: return 'Thermocouple Bricklet 2.0';
	case 2110: return 'Particulate Matter Bricklet';
	case 2111: return 'IO-4 Bricklet 2.0';
	case 2112: return 'OLED 128x64 Bricklet 2.0';
	case 2113: return 'Temperature Bricklet 2.0';
	case 2114: return 'IO-16 Bricklet 2.0';
	case 2115: return 'Analog Out Bricklet 3.0';
	case 2116: return 'Industrial Analog Out Bricklet 2.0';
	case 2117: return 'Barometer Bricklet 2.0';
	case 2118: return 'UV Light Bricklet 2.0';
	case 2119: return 'Dual Button Bricklet 2.0';
	case 2120: return 'Industrial Dual 0-20mA Bricklet 2.0';
	case 2121: return 'Industrial Dual Analog In Bricklet 2.0';
	case 2122: return 'Isolator Bricklet';
	case 2123: return 'One Wire Bricklet';
	case 2124: return 'Industrial Digital Out 4 Bricklet 2.0';
	case 2125: return 'Distance IR Bricklet 2.0';
	case 2127: return 'RGB LED Bricklet 2.0';
	case 2128: return 'Color Bricklet 2.0';
	case 2129: return 'Multi Touch Bricklet 2.0';
	case 2130: return 'Accelerometer Bricklet 2.0';
	case 2131: return 'Ambient Light Bricklet 3.0';
	case 2132: return 'Hall Effect Bricklet 2.0';
	case 2137: return 'Segment Display 4x7 Bricklet 2.0';
	case 2138: return 'Joystick Bricklet 2.0';
	case 2139: return 'Linear Poti Bricklet 2.0';
	case 2140: return 'Rotary Poti Bricklet 2.0';
	case 2144: return 'Laser Range Finder Bricklet 2.0';
	case 2145: return 'Piezo Speaker Bricklet 2.0';
	case 2146: return 'E-Paper 296x128 Bricklet';
	case 2147: return 'CO2 Bricklet 2.0';
	case 2152: return 'Energy Monitor Bricklet';
	case 2153: return 'Compass Bricklet';
	case 2156: return 'Performance DC Bricklet';
	case 2157: return 'Servo Bricklet 2.0';
	case 2161: return 'IMU Bricklet 3.0';
	case 2162: return 'Industrial Dual AC Relay Bricklet';
	case 2164: return 'Industrial PTC Bricklet';
	case 2165: return 'DC Bricklet 2.0';
	case 2166: return 'Silent Stepper Bricklet 2.0';
	default: return "Unknown Device [$device_identifier]";
	}
}

?>
