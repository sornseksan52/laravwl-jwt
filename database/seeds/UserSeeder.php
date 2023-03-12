<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //เขียนคำสั่งลบข้อมูลในตาราง users และทำการเพิ่มข้อมูลเข้าไปใหม่
		DB::table('users')->truncate();
		DB::table('users')->insert(
            [
                [
                    "name" => "Micah Figueroa",
                    "phone" => "(175) 897-5654",
                    "email" => "vestibulum.ut@aol.net",
                    "password" => bcrypt("hPbID53PBJ8Yl"),
                    "username" => "Aimee",
                    "company" => "Tempor Diam Company",
                    "nationality" => "Norway"
                ],
                [
                    "name" => "Salvador Robles",
                    "phone" => "(149) 416-0327",
                    "email" => "ut.nec.urna@aol.com",
                    "password" => bcrypt("hSfZR22LDE5Js"),
                    "username" => "Moana",
                    "company" => "Sagittis Felis LLC",
                    "nationality" => "Nigeria"
                ],
                [
                    "name" => "Daphne Solomon",
                    "phone" => "(465) 633-1234",
                    "email" => "facilisis@hotmail.net",
                    "password" => bcrypt("kXwSX24ASJ0Eq"),
                    "username" => "Ila",
                    "company" => "Non LLP",
                    "nationality" => "Philippines"
                ],
                [
                    "name" => "Inga Dudley",
                    "phone" => "(785) 320-8427",
                    "email" => "diam.luctus@yahoo.org",
                    "password" => bcrypt("oEeJB37YRE5Pp"),
                    "username" => "Samson",
                    "company" => "Eu PC",
                    "nationality" => "India"
                ],
                [
                    "name" => "Farrah Bartlett",
                    "phone" => "1-975-537-1622",
                    "email" => "hendrerit.a@google.couk",
                    "password" => bcrypt("hMmHQ80SSX3Rv"),
                    "username" => "Brynne",
                    "company" => "Consectetuer Incorporated",
                    "nationality" => "Belgium"
                ],
                [
                    "name" => "Bethany Martinez",
                    "phone" => "(344) 341-3583",
                    "email" => "dapibus.quam@outlook.couk",
                    "password" => bcrypt("eIqCV98NVL2Ft"),
                    "username" => "Dante",
                    "company" => "Lorem Vitae Corporation",
                    "nationality" => "Australia"
                ],
                [
                    "name" => "Olga Harmon",
                    "phone" => "(535) 736-8745",
                    "email" => "vel.venenatis@yahoo.edu",
                    "password" => bcrypt("iIsNH42FEK2Gr"),
                    "username" => "Louis",
                    "company" => "Eu Industries",
                    "nationality" => "Peru"
                ],
                [
                    "name" => "Tiger Oneal",
                    "phone" => "1-330-563-3873",
                    "email" => "a.auctor.non@aol.org",
                    "password" => bcrypt("vXqIF11GSI6Bt"),
                    "username" => "Stephanie",
                    "company" => "Pellentesque Massa Lobortis Inc.",
                    "nationality" => "Austria"
                ],
                [
                    "name" => "Adria Mcclure",
                    "phone" => "1-966-100-7223",
                    "email" => "faucibus.ut@protonmail.couk",
                    "password" => bcrypt("iHkRY42LBR8Rw"),
                    "username" => "Gil",
                    "company" => "Egestas Fusce Aliquet Industries",
                    "nationality" => "Italy"
                ],
                [
                    "name" => "Price Watson",
                    "phone" => "1-265-555-4354",
                    "email" => "sem.egestas@hotmail.org",
                    "password" => bcrypt("oUqRC54QPQ7Xl"),
                    "username" => "Kylynn",
                    "company" => "Donec Ltd",
                    "nationality" => "Australia"
                ],
                [
                    "name" => "Hakeem Gillespie",
                    "phone" => "1-824-119-7226",
                    "email" => "semper.erat.in@protonmail.ca",
                    "password" => bcrypt("uHkGP44PZG1Ki"),
                    "username" => "Rowan",
                    "company" => "Vulputate Velit Eu Incorporated",
                    "nationality" => "Australia"
                ],
                [
                    "name" => "Laith Tillman",
                    "phone" => "(946) 933-3197",
                    "email" => "purus.nullam.scelerisque@yahoo.net",
                    "password" => bcrypt("hHbMJ30BNT5Ms"),
                    "username" => "Uriah",
                    "company" => "Gravida Molestie Company",
                    "nationality" => "Indonesia"
                ],
                [
                    "name" => "Dean Clements",
                    "phone" => "1-177-836-7163",
                    "email" => "facilisis.eget.ipsum@yahoo.com",
                    "password" => bcrypt("jKsEU25HAT2Uo"),
                    "username" => "Bryar",
                    "company" => "Aliquet Vel Vulputate Institute",
                    "nationality" => "Poland"
                ],
                [
                    "name" => "Drew Payne",
                    "phone" => "1-964-982-5491",
                    "email" => "mauris@hotmail.com",
                    "password" => bcrypt("mJbFX15JKQ3Vu"),
                    "username" => "Adrian",
                    "company" => "Molestie Associates",
                    "nationality" => "Norway"
                ],
                [
                    "name" => "Cora Foreman",
                    "phone" => "(533) 823-6188",
                    "email" => "eget.ipsum.suspendisse@outlook.edu",
                    "password" => bcrypt("hBxGG22QEY8Ge"),
                    "username" => "Oscar",
                    "company" => "Vivamus Molestie LLP",
                    "nationality" => "United States"
                ],
                [
                    "name" => "Nero Woodard",
                    "phone" => "1-756-145-6998",
                    "email" => "eu@outlook.ca",
                    "password" => bcrypt("wChEM48XRS5Ps"),
                    "username" => "Aphrodite",
                    "company" => "Vestibulum Foundation",
                    "nationality" => "Germany"
                ],
                [
                    "name" => "Hanae Bond",
                    "phone" => "1-853-416-6337",
                    "email" => "sem.consequat.nec@protonmail.net",
                    "password" => bcrypt("qCsNY75RIM0Li"),
                    "username" => "Marah",
                    "company" => "Malesuada Consulting",
                    "nationality" => "Philippines"
                ],
                [
                    "name" => "Emery Harrington",
                    "phone" => "(750) 611-1035",
                    "email" => "ligula@aol.org",
                    "password" => bcrypt("iKiWG74WQM2Tn"),
                    "username" => "Stephanie",
                    "company" => "Euismod Foundation",
                    "nationality" => "Colombia"
                ],
                [
                    "name" => "Mallory Reeves",
                    "phone" => "1-655-719-7060",
                    "email" => "eleifend.nec@yahoo.com",
                    "password" => bcrypt("sIlKI65BEC0Ds"),
                    "username" => "Judah",
                    "company" => "Aliquam Erat Industries",
                    "nationality" => "Colombia"
                ],
                [
                    "name" => "Cara Arnold",
                    "phone" => "1-248-752-1173",
                    "email" => "eu.placerat@outlook.couk",
                    "password" => bcrypt("dKcOD51TUQ3Aq"),
                    "username" => "Maris",
                    "company" => "Neque Non Quam Incorporated",
                    "nationality" => "Philippines"
                ]
            ]
        );
    }
}
