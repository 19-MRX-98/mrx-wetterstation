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

require_once(__DIR__ . '/IPConnection.php');

/**
 * 433MHz receiver for outdoor weather station
 */
class BrickletOutdoorWeather extends Device
{

    /**
     * Reports the station data every time a new data packet is received.
     * See BrickletOutdoorWeather::getStationData() for information about the data.
     * 
     * For each station the callback will be triggered about every 45 seconds.
     * 
     * Turn the callback on/off with BrickletOutdoorWeather::setStationCallbackConfiguration()
     * (by default it is turned off).
     */
    const CALLBACK_STATION_DATA = 9;

    /**
     * Reports the sensor data every time a new data packet is received.
     * See BrickletOutdoorWeather::getSensorData() for information about the data.
     * 
     * For each sensor the callback will be called about every 45 seconds.
     * 
     * Turn the callback on/off with BrickletOutdoorWeather::setSensorCallbackConfiguration()
     * (by default it is turned off).
     */
    const CALLBACK_SENSOR_DATA = 10;


    /**
     * @internal
     */
    const FUNCTION_GET_STATION_IDENTIFIERS_LOW_LEVEL = 1;

    /**
     * @internal
     */
    const FUNCTION_GET_SENSOR_IDENTIFIERS_LOW_LEVEL = 2;

    /**
     * @internal
     */
    const FUNCTION_GET_STATION_DATA = 3;

    /**
     * @internal
     */
    const FUNCTION_GET_SENSOR_DATA = 4;

    /**
     * @internal
     */
    const FUNCTION_SET_STATION_CALLBACK_CONFIGURATION = 5;

    /**
     * @internal
     */
    const FUNCTION_GET_STATION_CALLBACK_CONFIGURATION = 6;

    /**
     * @internal
     */
    const FUNCTION_SET_SENSOR_CALLBACK_CONFIGURATION = 7;

    /**
     * @internal
     */
    const FUNCTION_GET_SENSOR_CALLBACK_CONFIGURATION = 8;

    /**
     * @internal
     */
    const FUNCTION_GET_SPITFP_ERROR_COUNT = 234;

    /**
     * @internal
     */
    const FUNCTION_SET_BOOTLOADER_MODE = 235;

    /**
     * @internal
     */
    const FUNCTION_GET_BOOTLOADER_MODE = 236;

    /**
     * @internal
     */
    const FUNCTION_SET_WRITE_FIRMWARE_POINTER = 237;

    /**
     * @internal
     */
    const FUNCTION_WRITE_FIRMWARE = 238;

    /**
     * @internal
     */
    const FUNCTION_SET_STATUS_LED_CONFIG = 239;

    /**
     * @internal
     */
    const FUNCTION_GET_STATUS_LED_CONFIG = 240;

    /**
     * @internal
     */
    const FUNCTION_GET_CHIP_TEMPERATURE = 242;

    /**
     * @internal
     */
    const FUNCTION_RESET = 243;

    /**
     * @internal
     */
    const FUNCTION_WRITE_UID = 248;

    /**
     * @internal
     */
    const FUNCTION_READ_UID = 249;

    /**
     * @internal
     */
    const FUNCTION_GET_IDENTITY = 255;

    const WIND_DIRECTION_N = 0;
    const WIND_DIRECTION_NNE = 1;
    const WIND_DIRECTION_NE = 2;
    const WIND_DIRECTION_ENE = 3;
    const WIND_DIRECTION_E = 4;
    const WIND_DIRECTION_ESE = 5;
    const WIND_DIRECTION_SE = 6;
    const WIND_DIRECTION_SSE = 7;
    const WIND_DIRECTION_S = 8;
    const WIND_DIRECTION_SSW = 9;
    const WIND_DIRECTION_SW = 10;
    const WIND_DIRECTION_WSW = 11;
    const WIND_DIRECTION_W = 12;
    const WIND_DIRECTION_WNW = 13;
    const WIND_DIRECTION_NW = 14;
    const WIND_DIRECTION_NNW = 15;
    const WIND_DIRECTION_ERROR = 255;
    const BOOTLOADER_MODE_BOOTLOADER = 0;
    const BOOTLOADER_MODE_FIRMWARE = 1;
    const BOOTLOADER_MODE_BOOTLOADER_WAIT_FOR_REBOOT = 2;
    const BOOTLOADER_MODE_FIRMWARE_WAIT_FOR_REBOOT = 3;
    const BOOTLOADER_MODE_FIRMWARE_WAIT_FOR_ERASE_AND_REBOOT = 4;
    const BOOTLOADER_STATUS_OK = 0;
    const BOOTLOADER_STATUS_INVALID_MODE = 1;
    const BOOTLOADER_STATUS_NO_CHANGE = 2;
    const BOOTLOADER_STATUS_ENTRY_FUNCTION_NOT_PRESENT = 3;
    const BOOTLOADER_STATUS_DEVICE_IDENTIFIER_INCORRECT = 4;
    const BOOTLOADER_STATUS_CRC_MISMATCH = 5;
    const STATUS_LED_CONFIG_OFF = 0;
    const STATUS_LED_CONFIG_ON = 1;
    const STATUS_LED_CONFIG_SHOW_HEARTBEAT = 2;
    const STATUS_LED_CONFIG_SHOW_STATUS = 3;

    const DEVICE_IDENTIFIER = 288;

    const DEVICE_DISPLAY_NAME = 'Outdoor Weather Bricklet';

    /**
     * Creates an object with the unique device ID $uid. This object can
     * then be added to the IP connection.
     *
     * @param string $uid
     */
    public function __construct($uid, $ipcon)
    {
        parent::__construct($uid, $ipcon, self::DEVICE_IDENTIFIER, self::DEVICE_DISPLAY_NAME);

        $this->api_version = array(2, 0, 0);

        $this->response_expected[self::FUNCTION_GET_STATION_IDENTIFIERS_LOW_LEVEL] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_SENSOR_IDENTIFIERS_LOW_LEVEL] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_STATION_DATA] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_SENSOR_DATA] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_STATION_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_TRUE;
        $this->response_expected[self::FUNCTION_GET_STATION_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_SENSOR_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_TRUE;
        $this->response_expected[self::FUNCTION_GET_SENSOR_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_SPITFP_ERROR_COUNT] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_BOOTLOADER_MODE] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_BOOTLOADER_MODE] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_WRITE_FIRMWARE_POINTER] = self::RESPONSE_EXPECTED_FALSE;
        $this->response_expected[self::FUNCTION_WRITE_FIRMWARE] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_STATUS_LED_CONFIG] = self::RESPONSE_EXPECTED_FALSE;
        $this->response_expected[self::FUNCTION_GET_STATUS_LED_CONFIG] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_CHIP_TEMPERATURE] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_RESET] = self::RESPONSE_EXPECTED_FALSE;
        $this->response_expected[self::FUNCTION_WRITE_UID] = self::RESPONSE_EXPECTED_FALSE;
        $this->response_expected[self::FUNCTION_READ_UID] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_IDENTITY] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;

        $this->callback_wrappers[self::CALLBACK_STATION_DATA] = array(26, 'callbackWrapperStationData');
        $this->callback_wrappers[self::CALLBACK_SENSOR_DATA] = array(12, 'callbackWrapperSensorData');

        $ipcon->addDevice($this);
    }

    /**
     * @internal
     * @param string $header
     * @param string $data
     */
    public function handleCallback($header, $data)
    {
        $wrapper = $this->callback_wrappers[$header['function_id']];

        if (8 + strlen($data) !== $wrapper[0]) {
            return; // Silently ignoring callback with wrong length
        }

        call_user_func(array($this, $wrapper[1]), $data);
    }

    /**
     * Returns the identifiers (number between 0 and 255) of all `stations
     * <https://www.tinkerforge.com/en/shop/accessories/sensors/outdoor-weather-station-ws-6147.html>`__
     * that have been seen since the startup of the Bricklet.
     * 
     * Each station gives itself a random identifier on first startup.
     * 
     * Since firmware version 2.0.2 a station is removed from the list if no data was received for
     * 12 hours.
     * 
     * 
     * @return array
     */
    public function getStationIdentifiersLowLevel()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_STATION_IDENTIFIERS_LOW_LEVEL, $payload, 72);

        $payload = unpack('v1identifiers_length/v1identifiers_chunk_offset/C60identifiers_chunk_data', $data);

        $ret['identifiers_length'] = $payload['identifiers_length'];
        $ret['identifiers_chunk_offset'] = $payload['identifiers_chunk_offset'];
        $ret['identifiers_chunk_data'] = IPConnection::collectUnpackedArray($payload, 'identifiers_chunk_data', 60);

        return $ret;
    }

    /**
     * Returns the identifiers (number between 0 and 255) of all `sensors
     * <https://www.tinkerforge.com/en/shop/accessories/sensors/temperature-humidity-sensor-th-6148.html>`__
     * that have been seen since the startup of the Bricklet.
     * 
     * Each sensor gives itself a random identifier on first startup.
     * 
     * Since firmware version 2.0.2 a sensor is removed from the list if no data was received for
     * 12 hours.
     * 
     * 
     * @return array
     */
    public function getSensorIdentifiersLowLevel()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_SENSOR_IDENTIFIERS_LOW_LEVEL, $payload, 72);

        $payload = unpack('v1identifiers_length/v1identifiers_chunk_offset/C60identifiers_chunk_data', $data);

        $ret['identifiers_length'] = $payload['identifiers_length'];
        $ret['identifiers_chunk_offset'] = $payload['identifiers_chunk_offset'];
        $ret['identifiers_chunk_data'] = IPConnection::collectUnpackedArray($payload, 'identifiers_chunk_data', 60);

        return $ret;
    }

    /**
     * Returns the last received data for a station with the given identifier.
     * Call BrickletOutdoorWeather::getStationIdentifiers() for a list of all available identifiers.
     * 
     * The return values are:
     * 
     * * Temperature,
     * * Humidity,
     * * Wind Speed,
     * * Gust Speed,
     * * Rain Fall (accumulated since station power-up),
     * * Wind Direction,
     * * Battery Low (true if battery is low) and
     * * Last Change (seconds since the reception of this data).
     * 
     * @param int $identifier
     * 
     * @return array
     */
    public function getStationData($identifier)
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';
        $payload .= pack('C', $identifier);

        $data = $this->sendRequest(self::FUNCTION_GET_STATION_DATA, $payload, 27);

        $payload = unpack('v1temperature/C1humidity/V1wind_speed/V1gust_speed/V1rain/C1wind_direction/C1battery_low/v1last_change', $data);

        $ret['temperature'] = IPConnection::fixUnpackedInt16($payload, 'temperature');
        $ret['humidity'] = $payload['humidity'];
        $ret['wind_speed'] = IPConnection::fixUnpackedUInt32($payload, 'wind_speed');
        $ret['gust_speed'] = IPConnection::fixUnpackedUInt32($payload, 'gust_speed');
        $ret['rain'] = IPConnection::fixUnpackedUInt32($payload, 'rain');
        $ret['wind_direction'] = $payload['wind_direction'];
        $ret['battery_low'] = (bool)$payload['battery_low'];
        $ret['last_change'] = $payload['last_change'];

        return $ret;
    }

    /**
     * Returns the last measured data for a sensor with the given identifier.
     * Call BrickletOutdoorWeather::getSensorIdentifiers() for a list of all available identifiers.
     * 
     * The return values are:
     * 
     * * Temperature,
     * * Humidity and
     * * Last Change (seconds since the last reception of data).
     * 
     * @param int $identifier
     * 
     * @return array
     */
    public function getSensorData($identifier)
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';
        $payload .= pack('C', $identifier);

        $data = $this->sendRequest(self::FUNCTION_GET_SENSOR_DATA, $payload, 13);

        $payload = unpack('v1temperature/C1humidity/v1last_change', $data);

        $ret['temperature'] = IPConnection::fixUnpackedInt16($payload, 'temperature');
        $ret['humidity'] = $payload['humidity'];
        $ret['last_change'] = $payload['last_change'];

        return $ret;
    }

    /**
     * Turns callback for station data on or off.
     * 
     * @param bool $enable_callback
     * 
     * @return void
     */
    public function setStationCallbackConfiguration($enable_callback)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('C', intval((bool)$enable_callback));

        $this->sendRequest(self::FUNCTION_SET_STATION_CALLBACK_CONFIGURATION, $payload, 0);
    }

    /**
     * Returns the configuration as set by BrickletOutdoorWeather::setStationCallbackConfiguration().
     * 
     * 
     * @return bool
     */
    public function getStationCallbackConfiguration()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_STATION_CALLBACK_CONFIGURATION, $payload, 9);

        $payload = unpack('C1enable_callback', $data);

        return (bool)$payload['enable_callback'];
    }

    /**
     * Turns callback for sensor data on or off.
     * 
     * @param bool $enable_callback
     * 
     * @return void
     */
    public function setSensorCallbackConfiguration($enable_callback)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('C', intval((bool)$enable_callback));

        $this->sendRequest(self::FUNCTION_SET_SENSOR_CALLBACK_CONFIGURATION, $payload, 0);
    }

    /**
     * Returns the configuration as set by BrickletOutdoorWeather::setSensorCallbackConfiguration().
     * 
     * 
     * @return bool
     */
    public function getSensorCallbackConfiguration()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_SENSOR_CALLBACK_CONFIGURATION, $payload, 9);

        $payload = unpack('C1enable_callback', $data);

        return (bool)$payload['enable_callback'];
    }

    /**
     * Returns the error count for the communication between Brick and Bricklet.
     * 
     * The errors are divided into
     * 
     * * ACK checksum errors,
     * * message checksum errors,
     * * framing errors and
     * * overflow errors.
     * 
     * The errors counts are for errors that occur on the Bricklet side. All
     * Bricks have a similar function that returns the errors on the Brick side.
     * 
     * 
     * @return array
     */
    public function getSPITFPErrorCount()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_SPITFP_ERROR_COUNT, $payload, 24);

        $payload = unpack('V1error_count_ack_checksum/V1error_count_message_checksum/V1error_count_frame/V1error_count_overflow', $data);

        $ret['error_count_ack_checksum'] = IPConnection::fixUnpackedUInt32($payload, 'error_count_ack_checksum');
        $ret['error_count_message_checksum'] = IPConnection::fixUnpackedUInt32($payload, 'error_count_message_checksum');
        $ret['error_count_frame'] = IPConnection::fixUnpackedUInt32($payload, 'error_count_frame');
        $ret['error_count_overflow'] = IPConnection::fixUnpackedUInt32($payload, 'error_count_overflow');

        return $ret;
    }

    /**
     * Sets the bootloader mode and returns the status after the requested
     * mode change was instigated.
     * 
     * You can change from bootloader mode to firmware mode and vice versa. A change
     * from bootloader mode to firmware mode will only take place if the entry function,
     * device identifier and CRC are present and correct.
     * 
     * This function is used by Brick Viewer during flashing. It should not be
     * necessary to call it in a normal user program.
     * 
     * @param int $mode
     * 
     * @return int
     */
    public function setBootloaderMode($mode)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('C', $mode);

        $data = $this->sendRequest(self::FUNCTION_SET_BOOTLOADER_MODE, $payload, 9);

        $payload = unpack('C1status', $data);

        return $payload['status'];
    }

    /**
     * Returns the current bootloader mode, see BrickletOutdoorWeather::setBootloaderMode().
     * 
     * 
     * @return int
     */
    public function getBootloaderMode()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_BOOTLOADER_MODE, $payload, 9);

        $payload = unpack('C1mode', $data);

        return $payload['mode'];
    }

    /**
     * Sets the firmware pointer for BrickletOutdoorWeather::writeFirmware(). The pointer has
     * to be increased by chunks of size 64. The data is written to flash
     * every 4 chunks (which equals to one page of size 256).
     * 
     * This function is used by Brick Viewer during flashing. It should not be
     * necessary to call it in a normal user program.
     * 
     * @param int $pointer
     * 
     * @return void
     */
    public function setWriteFirmwarePointer($pointer)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('V', $pointer);

        $this->sendRequest(self::FUNCTION_SET_WRITE_FIRMWARE_POINTER, $payload, 0);
    }

    /**
     * Writes 64 Bytes of firmware at the position as written by
     * BrickletOutdoorWeather::setWriteFirmwarePointer() before. The firmware is written
     * to flash every 4 chunks.
     * 
     * You can only write firmware in bootloader mode.
     * 
     * This function is used by Brick Viewer during flashing. It should not be
     * necessary to call it in a normal user program.
     * 
     * @param int[] $data
     * 
     * @return int
     */
    public function writeFirmware($data)
    {
        $this->checkValidity();

        $payload = '';
        for ($i = 0; $i < 64; $i++) {
            $payload .= pack('C', $data[$i]);
        }

        $data = $this->sendRequest(self::FUNCTION_WRITE_FIRMWARE, $payload, 9);

        $payload = unpack('C1status', $data);

        return $payload['status'];
    }

    /**
     * Sets the status LED configuration. By default the LED shows
     * communication traffic between Brick and Bricklet, it flickers once
     * for every 10 received data packets.
     * 
     * You can also turn the LED permanently on/off or show a heartbeat.
     * 
     * If the Bricklet is in bootloader mode, the LED is will show heartbeat by default.
     * 
     * @param int $config
     * 
     * @return void
     */
    public function setStatusLEDConfig($config)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('C', $config);

        $this->sendRequest(self::FUNCTION_SET_STATUS_LED_CONFIG, $payload, 0);
    }

    /**
     * Returns the configuration as set by BrickletOutdoorWeather::setStatusLEDConfig()
     * 
     * 
     * @return int
     */
    public function getStatusLEDConfig()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_STATUS_LED_CONFIG, $payload, 9);

        $payload = unpack('C1config', $data);

        return $payload['config'];
    }

    /**
     * Returns the temperature as measured inside the microcontroller. The
     * value returned is not the ambient temperature!
     * 
     * The temperature is only proportional to the real temperature and it has bad
     * accuracy. Practically it is only useful as an indicator for
     * temperature changes.
     * 
     * 
     * @return int
     */
    public function getChipTemperature()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_CHIP_TEMPERATURE, $payload, 10);

        $payload = unpack('v1temperature', $data);

        return IPConnection::fixUnpackedInt16($payload, 'temperature');
    }

    /**
     * Calling this function will reset the Bricklet. All configurations
     * will be lost.
     * 
     * After a reset you have to create new device objects,
     * calling functions on the existing ones will result in
     * undefined behavior!
     * 
     * 
     * @return void
     */
    public function reset()
    {
        $this->checkValidity();

        $payload = '';

        $this->sendRequest(self::FUNCTION_RESET, $payload, 0);
    }

    /**
     * Writes a new UID into flash. If you want to set a new UID
     * you have to decode the Base58 encoded UID string into an
     * integer first.
     * 
     * We recommend that you use Brick Viewer to change the UID.
     * 
     * @param int $uid
     * 
     * @return void
     */
    public function writeUID($uid)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('V', $uid);

        $this->sendRequest(self::FUNCTION_WRITE_UID, $payload, 0);
    }

    /**
     * Returns the current UID as an integer. Encode as
     * Base58 to get the usual string version.
     * 
     * 
     * @return int
     */
    public function readUID()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_READ_UID, $payload, 12);

        $payload = unpack('V1uid', $data);

        return IPConnection::fixUnpackedUInt32($payload, 'uid');
    }

    /**
     * Returns the UID, the UID where the Bricklet is connected to,
     * the position, the hardware and firmware version as well as the
     * device identifier.
     * 
     * The position can be 'a', 'b', 'c', 'd', 'e', 'f', 'g' or 'h' (Bricklet Port).
     * A Bricklet connected to an :ref:`Isolator Bricklet <isolator_bricklet>` is always at
     * position 'z'.
     * 
     * The device identifier numbers can be found :ref:`here <device_identifier>`.
     * |device_identifier_constant|
     * 
     * 
     * @return array
     */
    public function getIdentity()
    {
        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_IDENTITY, $payload, 33);

        $payload = unpack('c8uid/c8connected_uid/c1position/C3hardware_version/C3firmware_version/v1device_identifier', $data);

        $ret['uid'] = IPConnection::implodeUnpackedString($payload, 'uid', 8);
        $ret['connected_uid'] = IPConnection::implodeUnpackedString($payload, 'connected_uid', 8);
        $ret['position'] = chr($payload['position']);
        $ret['hardware_version'] = IPConnection::collectUnpackedArray($payload, 'hardware_version', 3);
        $ret['firmware_version'] = IPConnection::collectUnpackedArray($payload, 'firmware_version', 3);
        $ret['device_identifier'] = $payload['device_identifier'];

        return $ret;
    }

    /**
     * Returns the identifiers (number between 0 and 255) of all `stations
     * <https://www.tinkerforge.com/en/shop/accessories/sensors/outdoor-weather-station-ws-6147.html>`__
     * that have been seen since the startup of the Bricklet.
     * 
     * Each station gives itself a random identifier on first startup.
     * 
     * Since firmware version 2.0.2 a station is removed from the list if no data was received for
     * 12 hours.
     * 
     * 
     * @return array
     */
    public function getStationIdentifiers()
    {
        $ret = $this->getStationIdentifiersLowLevel();
        $identifiers_length = $ret['identifiers_length'];
        $identifiers_out_of_sync = $ret['identifiers_chunk_offset'] != 0;
        $identifiers_data = $ret['identifiers_chunk_data'];

        while (!$identifiers_out_of_sync && count($identifiers_data) < $identifiers_length) {
            $ret = $this->getStationIdentifiersLowLevel();
            $identifiers_length = $ret['identifiers_length'];
            $identifiers_out_of_sync = $ret['identifiers_chunk_offset'] != count($identifiers_data);
            $identifiers_data = array_merge($identifiers_data, $ret['identifiers_chunk_data']);
        }

        if ($identifiers_out_of_sync) { // discard remaining stream to bring it back in-sync
            while ($ret['identifiers_chunk_offset'] + 60 < $identifiers_length) {
                $ret = $this->getStationIdentifiersLowLevel();
                $identifiers_length = $ret['identifiers_length'];
            }

            throw new StreamOutOfSyncException('Identifiers stream is out-of-sync');
        }

        return array_slice($identifiers_data, 0, $identifiers_length);
    }

    /**
     * Returns the identifiers (number between 0 and 255) of all `sensors
     * <https://www.tinkerforge.com/en/shop/accessories/sensors/temperature-humidity-sensor-th-6148.html>`__
     * that have been seen since the startup of the Bricklet.
     * 
     * Each sensor gives itself a random identifier on first startup.
     * 
     * Since firmware version 2.0.2 a sensor is removed from the list if no data was received for
     * 12 hours.
     * 
     * 
     * @return array
     */
    public function getSensorIdentifiers()
    {
        $ret = $this->getSensorIdentifiersLowLevel();
        $identifiers_length = $ret['identifiers_length'];
        $identifiers_out_of_sync = $ret['identifiers_chunk_offset'] != 0;
        $identifiers_data = $ret['identifiers_chunk_data'];

        while (!$identifiers_out_of_sync && count($identifiers_data) < $identifiers_length) {
            $ret = $this->getSensorIdentifiersLowLevel();
            $identifiers_length = $ret['identifiers_length'];
            $identifiers_out_of_sync = $ret['identifiers_chunk_offset'] != count($identifiers_data);
            $identifiers_data = array_merge($identifiers_data, $ret['identifiers_chunk_data']);
        }

        if ($identifiers_out_of_sync) { // discard remaining stream to bring it back in-sync
            while ($ret['identifiers_chunk_offset'] + 60 < $identifiers_length) {
                $ret = $this->getSensorIdentifiersLowLevel();
                $identifiers_length = $ret['identifiers_length'];
            }

            throw new StreamOutOfSyncException('Identifiers stream is out-of-sync');
        }

        return array_slice($identifiers_data, 0, $identifiers_length);
    }

    /**
     * Registers the given $function with the given $callback_id. The optional
     * $user_data will be passed as the last parameter to the $function.
     *
     * @param int $callback_id
     * @param callable $function
     * @param mixed $user_data
     *
     * @return void
     */
    public function registerCallback($callback_id, $function, $user_data = NULL)
    {
        if (!is_callable($function)) {
            throw new \Exception('Function is not callable');
        }

        $this->registered_callbacks[$callback_id] = $function;
        $this->registered_callback_user_data[$callback_id] = $user_data;
    }

    /**
     * @internal
     * @param string $data
     */
    public function callbackWrapperStationData($data)
    {
        $payload = unpack('C1identifier/v1temperature/C1humidity/V1wind_speed/V1gust_speed/V1rain/C1wind_direction/C1battery_low', $data);
        $payload['temperature'] = IPConnection::fixUnpackedInt16($payload, 'temperature');
        $payload['wind_speed'] = IPConnection::fixUnpackedUInt32($payload, 'wind_speed');
        $payload['gust_speed'] = IPConnection::fixUnpackedUInt32($payload, 'gust_speed');
        $payload['rain'] = IPConnection::fixUnpackedUInt32($payload, 'rain');
        $payload['battery_low'] = (bool)$payload['battery_low'];

        if (array_key_exists(self::CALLBACK_STATION_DATA, $this->registered_callbacks)) {
            $function = $this->registered_callbacks[self::CALLBACK_STATION_DATA];
            $user_data = $this->registered_callback_user_data[self::CALLBACK_STATION_DATA];

            call_user_func($function, $payload['identifier'], $payload['temperature'], $payload['humidity'], $payload['wind_speed'], $payload['gust_speed'], $payload['rain'], $payload['wind_direction'], $payload['battery_low'], $user_data);
        }
    }

    /**
     * @internal
     * @param string $data
     */
    public function callbackWrapperSensorData($data)
    {
        $payload = unpack('C1identifier/v1temperature/C1humidity', $data);
        $payload['temperature'] = IPConnection::fixUnpackedInt16($payload, 'temperature');

        if (array_key_exists(self::CALLBACK_SENSOR_DATA, $this->registered_callbacks)) {
            $function = $this->registered_callbacks[self::CALLBACK_SENSOR_DATA];
            $user_data = $this->registered_callback_user_data[self::CALLBACK_SENSOR_DATA];

            call_user_func($function, $payload['identifier'], $payload['temperature'], $payload['humidity'], $user_data);
        }
    }
}

?>
