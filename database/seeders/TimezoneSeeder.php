<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('timezones')->insert([
            [ 'name' => 'UTC (Coordinated Universal Time)'],
            [ 'name' => 'UTC Azores, Cape Verde Island'],
            [ 'name' => 'UTC+01:00 (Coordinated Universal Time) Dublin, Edinburgh, London'],
            [ 'name' => 'UTC+01:00 (no DST) Tangiers, Casablanca'],
            [ 'name' => 'UTC+01:00 Algeria'],
            [ 'name' => 'UTC+01:00 Lisbon'],
            [ 'name' => 'UTC+02:00 Berlin, Stockholm, Rome, Bern, Brussels'],
            [ 'name' => 'UTC+02:00 Harare, Pretoria'],
            [ 'name' => 'UTC+02:00 Paris, Madrid'],
            [ 'name' => 'UTC+02:00 Prague, Warsaw'],
            [ 'name' => 'UTC+03:00 Athens, Helsinki'],
            [ 'name' => 'UTC+03:00 Athens, Helsinki, Istanbul'],
            [ 'name' => 'UTC+03:00 Baghdad, Kuwait, Nairobi, Riyadh'],
            [ 'name' => 'UTC+03:00 Cairo'],
            [ 'name' => 'UTC+03:00 Eastern Europe'],
            [ 'name' => 'UTC+03:00 Eastern European Time'],
            [ 'name' => 'UTC+03:00 Israel'],
            [ 'name' => 'UTC+03:00 Istanbul'],
            [ 'name' => 'UTC+03:00 Minsk'],
            [ 'name' => 'UTC+03:00 Moscow, St. Petersburg, Volgograd'],
            [ 'name' => 'UTC+03:30 Tehran'],
            [ 'name' => 'UTC+04:00 Abu Dhabi, Muscat, Tbilisi, Kazan'],
            [ 'name' => 'UTC+04:00 Armenia'],
            [ 'name' => 'UTC+04:30 Kabul'],
            [ 'name' => 'UTC+05:00 Islamabad, Karachi'],
            [ 'name' => 'UTC+05:00 Sverdlovsk'],
            [ 'name' => 'UTC+05:00 Sverdlovsk, Tashkent'],
            [ 'name' => 'UTC+05:00 Tashkent'],
            [ 'name' => 'UTC+05:30 Mumbai, Kolkata, Chennai, New Delhi'],
            [ 'name' => 'UTC+05:45 Kathmandu, Nepal'],
            [ 'name' => 'UTC+06:00 Almaty, Dhaka'],
            [ 'name' => 'UTC+06:00 Omsk'],
            [ 'name' => 'UTC+06:00 Omsk, Novosibirsk'],
            [ 'name' => 'UTC+06:30 Myanmar'],
            [ 'name' => 'UTC+06:30 Yangon'],
            [ 'name' => 'UTC+07:00 Bangkok, Jakarta, Hanoi'],
            [ 'name' => 'UTC+07:00 Krasnoyarsk'],
            [ 'name' => 'UTC+07:00 Novosibirsk'],
            [ 'name' => 'UTC+08:00 Beijing, Chongqing, Urumqi'],
            [ 'name' => 'UTC+08:00 Hong Kong SAR, Perth, Singapore, Taipei'],
            [ 'name' => 'UTC+08:00 Irkutsk (Lake Baikal)'],
            [ 'name' => 'UTC+09:00 Tokyo, Osaka, Sapporo, Seoul'],
            [ 'name' => 'UTC+09:00 Yakutsk (Lena River)'],
            [ 'name' => 'UTC+09:30 Adelaide'],
            [ 'name' => 'UTC+09:30 Darwin'],
            [ 'name' => 'UTC+10:00 Brisbane'],
            [ 'name' => 'UTC+10:00 Guam, Port Moresby'],
            [ 'name' => 'UTC+10:00 Hobart'],
            [ 'name' => 'UTC+10:00 Magadan, Vladivostok'],
            [ 'name' => 'UTC+10:00 Sydney, Melbourne'],
            [ 'name' => 'UTC+11:00 Solomon Islands, New Caledonia'],
            [ 'name' => 'UTC+12:00 Eniwetok, Kwajalein'],
            [ 'name' => 'UTC+12:00 Fiji Islands, Marshall Islands'],
            [ 'name' => 'UTC+12:00 Kamchatka'],
            [ 'name' => 'UTC+13:00 Apia (Samoa)'],
            [ 'name' => 'UTC+13:00 Wellington, Auckland'],
            [ 'name' => 'UTC-02:00 Mid-Atlantic'],
            [ 'name' => 'UTC-02:30 Newfoundland'],
            [ 'name' => 'UTC-03:00 Atlantic Time (Canada)'],
            [ 'name' => 'UTC-03:00 E Argentina (BA, DF, SC, TF)'],
            [ 'name' => 'UTC-03:00 NE Brazil (MA, PI, CE, RN, PB)'],
            [ 'name' => 'UTC-03:00 Pernambuco'],
            [ 'name' => 'UTC-03:00 S & SE Brazil (GO, DF, MG, ES, RJ, SP, PR, SC, RS)'],
            [ 'name' => 'UTC-04:00 Caracas'],
            [ 'name' => 'UTC-04:00 Eastern Time (US & Canada)'],
            [ 'name' => 'UTC-04:00 Eastern Time - Indiana - most locations'],
            [ 'name' => 'UTC-04:00 La Paz'],
            [ 'name' => 'UTC-05:00 Bogota, Lima'],
            [ 'name' => 'UTC-05:00 Central Time (US & Canada)'],
            [ 'name' => 'UTC-05:00 Eastern Time - Indiana - Starke County'],
            [ 'name' => 'UTC-06:00 Mexico City, Tegucigalpa'],
            [ 'name' => 'UTC-06:00 Mountain Time (US & Canada)'],
            [ 'name' => 'UTC-06:00 Nicaragua'],
            [ 'name' => 'UTC-06:00 Saskatchewan'],
            [ 'name' => 'UTC-07:00 Arizona'],
            [ 'name' => 'UTC-07:00 Pacific Time (US & Canada); Los Angeles'],
            [ 'name' => 'UTC-07:00 Pacific Time (US & Canada); Tijuana'],
            [ 'name' => 'UTC-08:00 Alaska'],
            [ 'name' => 'UTC-10:00 Hawaii'],
            [ 'name' => 'UTC-11:00 Midway Island, Samoa'],
        ]);
    }
}
