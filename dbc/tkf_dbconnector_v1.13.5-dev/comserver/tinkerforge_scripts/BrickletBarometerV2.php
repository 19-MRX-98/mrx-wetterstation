<?php

/* ***********************************************************
 * This file was automatically generated on 2022-05-11.      *
 *                                                           *
 * PHP Bindings Version 2.1.30                               *
 *                                                           *
 * If you have a bugfix for this file and want to commit it, *
 * please fix the bug in the generator. You can find a link  *
 * to the generators git repository on tinkerforge.com       *
 *************************************************************/

namespace Tinkerforge;

require_once(__DIR__ . '/IPConnection.php');

/**
 * Measures air pressure and altitude changes
 */
class BrickletBarometerV2 extends Device
{

    /**
     * This callback is triggered periodically according to the configuration set by
     * BrickletBarometerV2::setAirPressureCallbackConfiguration().
     * 
     * The parameter is the same as BrickletBarometerV2::getAirPressure().
     */
    const CALLBACK_AIR_PRESSURE = 4;

    /**
     * This callback is triggered periodically according to the configuration set by
     * BrickletBarometerV2::setAltitudeCallbackConfiguration().
     * 
     * The parameter is the same as BrickletBarometerV2::getAltitude().
     */
    const CALLBACK_ALTITUDE = 8;

    /**
     * This callback is triggered periodically according to the configuration set by
     * BrickletBarometerV2::setTemperatureCallbackConfiguration().
     * 
     * The parameter is the same as BrickletBarometerV2::getTemperature().
     */
    const CALLBACK_TEMPERATURE = 12;


    /**
     * @internal
     */
    const FUNCTION_GET_AIR_PRESSURE = 1;

    /**
     * @internal
     */
    const FUNCTION_SET_AIR_PRESSURE_CALLBACK_CONFIGURATION = 2;

    /**
     * @internal
     */
    const FUNCTION_GET_AIR_PRESSURE_CALLBACK_CONFIGURATION = 3;

    /**
     * @internal
     */
    const FUNCTION_GET_ALTITUDE = 5;

    /**
     * @internal
     */
    const FUNCTION_SET_ALTITUDE_CALLBACK_CONFIGURATION = 6;

    /**
     * @internal
     */
    const FUNCTION_GET_ALTITUDE_CALLBACK_CONFIGURATION = 7;

    /**
     * @internal
     */
    const FUNCTION_GET_TEMPERATURE = 9;

    /**
     * @internal
     */
    const FUNCTION_SET_TEMPERATURE_CALLBACK_CONFIGURATION = 10;

    /**
     * @internal
     */
    const FUNCTION_GET_TEMPERATURE_CALLBACK_CONFIGURATION = 11;

    /**
     * @internal
     */
    const FUNCTION_SET_MOVING_AVERAGE_CONFIGURATION = 13;

    /**
     * @internal
     */
    const FUNCTION_GET_MOVING_AVERAGE_CONFIGURATION = 14;

    /**
     * @internal
     */
    const FUNCTION_SET_REFERENCE_AIR_PRESSURE = 15;

    /**
     * @internal
     */
    const FUNCTION_GET_REFERENCE_AIR_PRESSURE = 16;

    /**
     * @internal
     */
    const FUNCTION_SET_CALIBRATION = 17;

    /**
     * @internal
     */
    const FUNCTION_GET_CALIBRATION = 18;

    /**
     * @internal
     */
    const FUNCTION_SET_SENSOR_CONFIGURATION = 19;

    /**
     * @internal
     */
    const FUNCTION_GET_SENSOR_CONFIGURATION = 20;

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

    const THRESHOLD_OPTION_OFF = 'x';
    const THRESHOLD_OPTION_OUTSIDE = 'o';
    const THRESHOLD_OPTION_INSIDE = 'i';
    const THRESHOLD_OPTION_SMALLER = '<';
    const THRESHOLD_OPTION_GREATER = '>';
    const DATA_RATE_OFF = 0;
    const DATA_RATE_1HZ = 1;
    const DATA_RATE_10HZ = 2;
    const DATA_RATE_25HZ = 3;
    const DATA_RATE_50HZ = 4;
    const DATA_RATE_75HZ = 5;
    const LOW_PASS_FILTER_OFF = 0;
    const LOW_PASS_FILTER_1_9TH = 1;
    const LOW_PASS_FILTER_1_20TH = 2;
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

    const DEVICE_IDENTIFIER = 2117;

    const DEVICE_DISPLAY_NAME = 'Barometer Bricklet 2.0';

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

        $this->response_expected[self::FUNCTION_GET_AIR_PRESSURE] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_AIR_PRESSURE_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_TRUE;
        $this->response_expected[self::FUNCTION_GET_AIR_PRESSURE_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_ALTITUDE] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_ALTITUDE_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_TRUE;
        $this->response_expected[self::FUNCTION_GET_ALTITUDE_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_GET_TEMPERATURE] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_TEMPERATURE_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_TRUE;
        $this->response_expected[self::FUNCTION_GET_TEMPERATURE_CALLBACK_CONFIGURATION] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_MOVING_AVERAGE_CONFIGURATION] = self::RESPONSE_EXPECTED_FALSE;
        $this->response_expected[self::FUNCTION_GET_MOVING_AVERAGE_CONFIGURATION] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_REFERENCE_AIR_PRESSURE] = self::RESPONSE_EXPECTED_FALSE;
        $this->response_expected[self::FUNCTION_GET_REFERENCE_AIR_PRESSURE] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_CALIBRATION] = self::RESPONSE_EXPECTED_FALSE;
        $this->response_expected[self::FUNCTION_GET_CALIBRATION] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
        $this->response_expected[self::FUNCTION_SET_SENSOR_CONFIGURATION] = self::RESPONSE_EXPECTED_FALSE;
        $this->response_expected[self::FUNCTION_GET_SENSOR_CONFIGURATION] = self::RESPONSE_EXPECTED_ALWAYS_TRUE;
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

        $this->callback_wrappers[self::CALLBACK_AIR_PRESSURE] = array(12, 'callbackWrapperAirPressure');
        $this->callback_wrappers[self::CALLBACK_ALTITUDE] = array(12, 'callbackWrapperAltitude');
        $this->callback_wrappers[self::CALLBACK_TEMPERATURE] = array(12, 'callbackWrapperTemperature');

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
     * Returns the measured air pressure.
     * 
     * 
     * If you want to get the value periodically, it is recommended to use the
     * BrickletBarometerV2::CALLBACK_AIR_PRESSURE callback. You can set the callback configuration
     * with BrickletBarometerV2::setAirPressureCallbackConfiguration().
     * 
     * 
     * @return int
     */
    public function getAirPressure()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_AIR_PRESSURE, $payload, 12);

        $payload = unpack('V1air_pressure', $data);

        return IPConnection::fixUnpackedInt32($payload, 'air_pressure');
    }

    /**
     * The period is the period with which the BrickletBarometerV2::CALLBACK_AIR_PRESSURE callback is triggered
     * periodically. A value of 0 turns the callback off.
     * 
     * If the `value has to change`-parameter is set to true, the callback is only
     * triggered after the value has changed. If the value didn't change
     * within the period, the callback is triggered immediately on change.
     * 
     * If it is set to false, the callback is continuously triggered with the period,
     * independent of the value.
     * 
     * It is furthermore possible to constrain the callback with thresholds.
     * 
     * The `option`-parameter together with min/max sets a threshold for the BrickletBarometerV2::CALLBACK_AIR_PRESSURE callback.
     * 
     * The following options are possible:
     * 
     * <code>
     *  "Option", "Description"
     * 
     *  "'x'",    "Threshold is turned off"
     *  "'o'",    "Threshold is triggered when the value is *outside* the min and max values"
     *  "'i'",    "Threshold is triggered when the value is *inside* or equal to the min and max values"
     *  "'<'",    "Threshold is triggered when the value is smaller than the min value (max is ignored)"
     *  "'>'",    "Threshold is triggered when the value is greater than the min value (max is ignored)"
     * </code>
     * 
     * If the option is set to 'x' (threshold turned off) the callback is triggered with the fixed period.
     * 
     * @param int $period
     * @param bool $value_has_to_change
     * @param string $option
     * @param int $min
     * @param int $max
     * 
     * @return void
     */
    public function setAirPressureCallbackConfiguration($period, $value_has_to_change, $option, $min, $max)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('V', $period);
        $payload .= pack('C', intval((bool)$value_has_to_change));
        $payload .= pack('c', ord($option));
        $payload .= pack('V', $min);
        $payload .= pack('V', $max);

        $this->sendRequest(self::FUNCTION_SET_AIR_PRESSURE_CALLBACK_CONFIGURATION, $payload, 0);
    }

    /**
     * Returns the callback configuration as set by BrickletBarometerV2::setAirPressureCallbackConfiguration().
     * 
     * 
     * @return array
     */
    public function getAirPressureCallbackConfiguration()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_AIR_PRESSURE_CALLBACK_CONFIGURATION, $payload, 22);

        $payload = unpack('V1period/C1value_has_to_change/c1option/V1min/V1max', $data);

        $ret['period'] = IPConnection::fixUnpackedUInt32($payload, 'period');
        $ret['value_has_to_change'] = (bool)$payload['value_has_to_change'];
        $ret['option'] = chr($payload['option']);
        $ret['min'] = IPConnection::fixUnpackedInt32($payload, 'min');
        $ret['max'] = IPConnection::fixUnpackedInt32($payload, 'max');

        return $ret;
    }

    /**
     * Returns the relative altitude of the air pressure sensor. The value
     * is calculated based on the difference between the
     * current air pressure and the reference air pressure that can be set
     * with BrickletBarometerV2::setReferenceAirPressure().
     * 
     * 
     * If you want to get the value periodically, it is recommended to use the
     * BrickletBarometerV2::CALLBACK_ALTITUDE callback. You can set the callback configuration
     * with BrickletBarometerV2::setAltitudeCallbackConfiguration().
     * 
     * 
     * @return int
     */
    public function getAltitude()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_ALTITUDE, $payload, 12);

        $payload = unpack('V1altitude', $data);

        return IPConnection::fixUnpackedInt32($payload, 'altitude');
    }

    /**
     * The period is the period with which the BrickletBarometerV2::CALLBACK_ALTITUDE callback is triggered
     * periodically. A value of 0 turns the callback off.
     * 
     * If the `value has to change`-parameter is set to true, the callback is only
     * triggered after the value has changed. If the value didn't change
     * within the period, the callback is triggered immediately on change.
     * 
     * If it is set to false, the callback is continuously triggered with the period,
     * independent of the value.
     * 
     * It is furthermore possible to constrain the callback with thresholds.
     * 
     * The `option`-parameter together with min/max sets a threshold for the BrickletBarometerV2::CALLBACK_ALTITUDE callback.
     * 
     * The following options are possible:
     * 
     * <code>
     *  "Option", "Description"
     * 
     *  "'x'",    "Threshold is turned off"
     *  "'o'",    "Threshold is triggered when the value is *outside* the min and max values"
     *  "'i'",    "Threshold is triggered when the value is *inside* or equal to the min and max values"
     *  "'<'",    "Threshold is triggered when the value is smaller than the min value (max is ignored)"
     *  "'>'",    "Threshold is triggered when the value is greater than the min value (max is ignored)"
     * </code>
     * 
     * If the option is set to 'x' (threshold turned off) the callback is triggered with the fixed period.
     * 
     * @param int $period
     * @param bool $value_has_to_change
     * @param string $option
     * @param int $min
     * @param int $max
     * 
     * @return void
     */
    public function setAltitudeCallbackConfiguration($period, $value_has_to_change, $option, $min, $max)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('V', $period);
        $payload .= pack('C', intval((bool)$value_has_to_change));
        $payload .= pack('c', ord($option));
        $payload .= pack('V', $min);
        $payload .= pack('V', $max);

        $this->sendRequest(self::FUNCTION_SET_ALTITUDE_CALLBACK_CONFIGURATION, $payload, 0);
    }

    /**
     * Returns the callback configuration as set by BrickletBarometerV2::setAltitudeCallbackConfiguration().
     * 
     * 
     * @return array
     */
    public function getAltitudeCallbackConfiguration()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_ALTITUDE_CALLBACK_CONFIGURATION, $payload, 22);

        $payload = unpack('V1period/C1value_has_to_change/c1option/V1min/V1max', $data);

        $ret['period'] = IPConnection::fixUnpackedUInt32($payload, 'period');
        $ret['value_has_to_change'] = (bool)$payload['value_has_to_change'];
        $ret['option'] = chr($payload['option']);
        $ret['min'] = IPConnection::fixUnpackedInt32($payload, 'min');
        $ret['max'] = IPConnection::fixUnpackedInt32($payload, 'max');

        return $ret;
    }

    /**
     * Returns the temperature of the air pressure sensor.
     * 
     * This temperature is used internally for temperature compensation
     * of the air pressure measurement. It is not as accurate as the
     * temperature measured by the :ref:`temperature_v2_bricklet` or the
     * :ref:`temperature_ir_v2_bricklet`.
     * 
     * 
     * If you want to get the value periodically, it is recommended to use the
     * BrickletBarometerV2::CALLBACK_TEMPERATURE callback. You can set the callback configuration
     * with BrickletBarometerV2::setTemperatureCallbackConfiguration().
     * 
     * 
     * @return int
     */
    public function getTemperature()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_TEMPERATURE, $payload, 12);

        $payload = unpack('V1temperature', $data);

        return IPConnection::fixUnpackedInt32($payload, 'temperature');
    }

    /**
     * The period is the period with which the BrickletBarometerV2::CALLBACK_TEMPERATURE callback is triggered
     * periodically. A value of 0 turns the callback off.
     * 
     * If the `value has to change`-parameter is set to true, the callback is only
     * triggered after the value has changed. If the value didn't change
     * within the period, the callback is triggered immediately on change.
     * 
     * If it is set to false, the callback is continuously triggered with the period,
     * independent of the value.
     * 
     * It is furthermore possible to constrain the callback with thresholds.
     * 
     * The `option`-parameter together with min/max sets a threshold for the BrickletBarometerV2::CALLBACK_TEMPERATURE callback.
     * 
     * The following options are possible:
     * 
     * <code>
     *  "Option", "Description"
     * 
     *  "'x'",    "Threshold is turned off"
     *  "'o'",    "Threshold is triggered when the value is *outside* the min and max values"
     *  "'i'",    "Threshold is triggered when the value is *inside* or equal to the min and max values"
     *  "'<'",    "Threshold is triggered when the value is smaller than the min value (max is ignored)"
     *  "'>'",    "Threshold is triggered when the value is greater than the min value (max is ignored)"
     * </code>
     * 
     * If the option is set to 'x' (threshold turned off) the callback is triggered with the fixed period.
     * 
     * @param int $period
     * @param bool $value_has_to_change
     * @param string $option
     * @param int $min
     * @param int $max
     * 
     * @return void
     */
    public function setTemperatureCallbackConfiguration($period, $value_has_to_change, $option, $min, $max)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('V', $period);
        $payload .= pack('C', intval((bool)$value_has_to_change));
        $payload .= pack('c', ord($option));
        $payload .= pack('V', $min);
        $payload .= pack('V', $max);

        $this->sendRequest(self::FUNCTION_SET_TEMPERATURE_CALLBACK_CONFIGURATION, $payload, 0);
    }

    /**
     * Returns the callback configuration as set by BrickletBarometerV2::setTemperatureCallbackConfiguration().
     * 
     * 
     * @return array
     */
    public function getTemperatureCallbackConfiguration()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_TEMPERATURE_CALLBACK_CONFIGURATION, $payload, 22);

        $payload = unpack('V1period/C1value_has_to_change/c1option/V1min/V1max', $data);

        $ret['period'] = IPConnection::fixUnpackedUInt32($payload, 'period');
        $ret['value_has_to_change'] = (bool)$payload['value_has_to_change'];
        $ret['option'] = chr($payload['option']);
        $ret['min'] = IPConnection::fixUnpackedInt32($payload, 'min');
        $ret['max'] = IPConnection::fixUnpackedInt32($payload, 'max');

        return $ret;
    }

    /**
     * Sets the length of a `moving averaging <https://en.wikipedia.org/wiki/Moving_average>`__
     * for the air pressure and temperature measurements.
     * 
     * Setting the length to 1 will turn the averaging off. With less
     * averaging, there is more noise on the data.
     * 
     * If you want to do long term measurements the longest moving average will give
     * the cleanest results.
     * 
     * @param int $moving_average_length_air_pressure
     * @param int $moving_average_length_temperature
     * 
     * @return void
     */
    public function setMovingAverageConfiguration($moving_average_length_air_pressure, $moving_average_length_temperature)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('v', $moving_average_length_air_pressure);
        $payload .= pack('v', $moving_average_length_temperature);

        $this->sendRequest(self::FUNCTION_SET_MOVING_AVERAGE_CONFIGURATION, $payload, 0);
    }

    /**
     * Returns the moving average configuration as set by
     * BrickletBarometerV2::setMovingAverageConfiguration().
     * 
     * 
     * @return array
     */
    public function getMovingAverageConfiguration()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_MOVING_AVERAGE_CONFIGURATION, $payload, 12);

        $payload = unpack('v1moving_average_length_air_pressure/v1moving_average_length_temperature', $data);

        $ret['moving_average_length_air_pressure'] = $payload['moving_average_length_air_pressure'];
        $ret['moving_average_length_temperature'] = $payload['moving_average_length_temperature'];

        return $ret;
    }

    /**
     * Sets the reference air pressure for the altitude calculation.
     * Setting the reference to the
     * current air pressure results in a calculated altitude of 0mm. Passing 0 is
     * a shortcut for passing the current air pressure as reference.
     * 
     * Well known reference values are the Q codes
     * `QNH <https://en.wikipedia.org/wiki/QNH>`__ and
     * `QFE <https://en.wikipedia.org/wiki/Mean_sea_level_pressure#Mean_sea_level_pressure>`__
     * used in aviation.
     * 
     * @param int $air_pressure
     * 
     * @return void
     */
    public function setReferenceAirPressure($air_pressure)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('V', $air_pressure);

        $this->sendRequest(self::FUNCTION_SET_REFERENCE_AIR_PRESSURE, $payload, 0);
    }

    /**
     * Returns the reference air pressure as set by BrickletBarometerV2::setReferenceAirPressure().
     * 
     * 
     * @return int
     */
    public function getReferenceAirPressure()
    {
        $this->checkValidity();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_REFERENCE_AIR_PRESSURE, $payload, 12);

        $payload = unpack('V1air_pressure', $data);

        return IPConnection::fixUnpackedInt32($payload, 'air_pressure');
    }

    /**
     * Sets the one point calibration (OPC) values for the air pressure measurement.
     * 
     * Before the Bricklet can be calibrated any previous calibration has to be removed
     * by setting ``measured air pressure`` and ``actual air pressure`` to 0.
     * 
     * Then the current air pressure has to be measured using the Bricklet
     * (``measured air pressure``) and with an accurate reference barometer
     * (``actual air pressure``) at the same time and passed to this function.
     * 
     * After proper calibration the air pressure measurement can achieve an accuracy
     * up to 0.2 hPa.
     * 
     * The calibration is saved in the EEPROM of the Bricklet and only needs to be
     * configured once.
     * 
     * @param int $measured_air_pressure
     * @param int $actual_air_pressure
     * 
     * @return void
     */
    public function setCalibration($measured_air_pressure, $actual_air_pressure)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('V', $measured_air_pressure);
        $payload .= pack('V', $actual_air_pressure);

        $this->sendRequest(self::FUNCTION_SET_CALIBRATION, $payload, 0);
    }

    /**
     * Returns the air pressure one point calibration values as set by
     * BrickletBarometerV2::setCalibration().
     * 
     * 
     * @return array
     */
    public function getCalibration()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_CALIBRATION, $payload, 16);

        $payload = unpack('V1measured_air_pressure/V1actual_air_pressure', $data);

        $ret['measured_air_pressure'] = IPConnection::fixUnpackedInt32($payload, 'measured_air_pressure');
        $ret['actual_air_pressure'] = IPConnection::fixUnpackedInt32($payload, 'actual_air_pressure');

        return $ret;
    }

    /**
     * Configures the data rate and air pressure low pass filter. The low pass filter
     * cut-off frequency (if enabled) can be set to 1/9th or 1/20th of the configure
     * data rate to decrease the noise on the air pressure data.
     * 
     * The low pass filter configuration only applies to the air pressure measurement.
     * There is no low pass filter for the temperature measurement.
     * 
     * A higher data rate will result in a less precise temperature because of
     * self-heating of the sensor. If the accuracy of the temperature reading is
     * important to you, we would recommend the 1Hz data rate.
     * 
     * @param int $data_rate
     * @param int $air_pressure_low_pass_filter
     * 
     * @return void
     */
    public function setSensorConfiguration($data_rate, $air_pressure_low_pass_filter)
    {
        $this->checkValidity();

        $payload = '';
        $payload .= pack('C', $data_rate);
        $payload .= pack('C', $air_pressure_low_pass_filter);

        $this->sendRequest(self::FUNCTION_SET_SENSOR_CONFIGURATION, $payload, 0);
    }

    /**
     * Returns the sensor configuration as set by BrickletBarometerV2::setSensorConfiguration().
     * 
     * 
     * @return array
     */
    public function getSensorConfiguration()
    {
        $this->checkValidity();

        $ret = array();

        $payload = '';

        $data = $this->sendRequest(self::FUNCTION_GET_SENSOR_CONFIGURATION, $payload, 10);

        $payload = unpack('C1data_rate/C1air_pressure_low_pass_filter', $data);

        $ret['data_rate'] = $payload['data_rate'];
        $ret['air_pressure_low_pass_filter'] = $payload['air_pressure_low_pass_filter'];

        return $ret;
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
     * Returns the current bootloader mode, see BrickletBarometerV2::setBootloaderMode().
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
     * Sets the firmware pointer for BrickletBarometerV2::writeFirmware(). The pointer has
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
     * BrickletBarometerV2::setWriteFirmwarePointer() before. The firmware is written
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
     * Returns the configuration as set by BrickletBarometerV2::setStatusLEDConfig()
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
    public function callbackWrapperAirPressure($data)
    {
        $payload = unpack('V1air_pressure', $data);
        $payload['air_pressure'] = IPConnection::fixUnpackedInt32($payload, 'air_pressure');

        if (array_key_exists(self::CALLBACK_AIR_PRESSURE, $this->registered_callbacks)) {
            $function = $this->registered_callbacks[self::CALLBACK_AIR_PRESSURE];
            $user_data = $this->registered_callback_user_data[self::CALLBACK_AIR_PRESSURE];

            call_user_func($function, $payload['air_pressure'], $user_data);
        }
    }

    /**
     * @internal
     * @param string $data
     */
    public function callbackWrapperAltitude($data)
    {
        $payload = unpack('V1altitude', $data);
        $payload['altitude'] = IPConnection::fixUnpackedInt32($payload, 'altitude');

        if (array_key_exists(self::CALLBACK_ALTITUDE, $this->registered_callbacks)) {
            $function = $this->registered_callbacks[self::CALLBACK_ALTITUDE];
            $user_data = $this->registered_callback_user_data[self::CALLBACK_ALTITUDE];

            call_user_func($function, $payload['altitude'], $user_data);
        }
    }

    /**
     * @internal
     * @param string $data
     */
    public function callbackWrapperTemperature($data)
    {
        $payload = unpack('V1temperature', $data);
        $payload['temperature'] = IPConnection::fixUnpackedInt32($payload, 'temperature');

        if (array_key_exists(self::CALLBACK_TEMPERATURE, $this->registered_callbacks)) {
            $function = $this->registered_callbacks[self::CALLBACK_TEMPERATURE];
            $user_data = $this->registered_callback_user_data[self::CALLBACK_TEMPERATURE];

            call_user_func($function, $payload['temperature'], $user_data);
        }
    }
}

?>
