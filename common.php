<?php
    function getHead() {
        return (
        '<head>
            <title>GeekLuv</title>

            <meta charset="utf-8" />

            <link href="heart.gif" type="image/gif" rel="shortcut icon" />
            <link href="Geekluv.css" type="text/css" rel="stylesheet" />
        </head>'
        );
    }

    function getHeader() {
        return (
            '<div id="bannerarea">
                <img src="nerdxing.jpg" alt="banner logo" /> <br />
                <h1>Where Meek Geeks Meet</h1>
            </div>'
        );
    }

    function getFooter() {
        return (
            '    <ul>
                    <li>
                        <a href="geekluv.php">
                            <img src="back.gif" alt="icon" />
                            Back to front page
                        </a>
                    </li>
                </ul>
            <footer>
                <p>
                    This page is for single nerds to meet and date each other!  Type in your personal information and wait for the nerdly luv to begin!  Thank you for using our site.
                </p>

                <p>
                    Results and page &copy; Copyright Geekluv Inc.
                </p>
            </footer>'
        );
    }

    function displayProfile($profile) {
        $name = $profile->getFullName();
        $age = $profile->getAge();
        $personality = $profile->getPersonalityType();
        $OS = $profile->getFavoriteSystem();
        $sex = $profile->getSex();
        
        if ($sex == "F"){
            $imageSrc = "user.png";
        } else {
            $imageSrc = "userm.png";
        }
        print_r(
            "<div class='match center'>
                <p> $name </p>
                <image src=$imageSrc alt='user profile picture'>
                <ul>
                    <li> Age: $age </li>
                    <li> Personality Type: $personality </li>
                    <li> Favorite OS:  $OS </li>
                </ul>
            </div>
            ");
    }


    class Profile {
        public $info;
        
        private $firstName = 0;
        private $lastName = 0;
        private $sex = 1;
        private $age = 2;
        private $personality = 3;
        private $opSystem = 4;
        private $minAge = 5;
        private $maxAge = 6;
        private $desiredSex = 7;        
        
        public function __construct($rawData) {
            $this->info = explode(",", $rawData);
        }
        
        public function getFirstName() {
            $name = $this->info[0];
            $names = explode(" ", $name);
            return $names[0];
        }
        
        public function getLastName() {
            $name = $this->info[0];
            $names = explode(" ", $name);
            return $names[1];
        }
        
        public function getSex() {
            return $this->info[$this->sex];
        }
        
        public function getPersonalityType() {
            return $this->info[$this->personality];
        }
        
        public function getAge() {
            return $this->info[$this->age];
        }
        
        public function getFavoriteSystem() {
            return $this->info[$this->opSystem];
        }
        
        public function getMinAge() {
            return $this->info[$this->minAge];
        }
        
        public function getMaxAge() {
            return $this->info[$this->maxAge];
        }
        
        public function getDesiredSex() {
            return $this->info[$this->desiredSex];
        }
        
        public function getFullName() {
            return $this->info[0];
        }
    }

    
    // Initialize each of the profiles.
    $profiles = array();
    $singlesHandler = fopen("singles2.txt", "r");
    while (($line = fgets($singlesHandler)) !== false) {
        $profile = new Profile($line);
        array_push($profiles, $profile);
    }
    fclose($singlesHandler);

    
    function getUserProfile($pName) {
        global $profiles;
        foreach ($profiles as $profile) {
            if ($profile->getFullName() == $pName) {
                return $profile;
            }
        }
        return false;
    }


    function getMatches($pProfile) {
        global $profiles;
        $matches = array();
        $desired = $pProfile->getDesiredSex();
        $sex = $pProfile->getSex();
        $age = $pProfile->getAge();
        $minAge = $pProfile->getMinAge();
        $maxAge = $pProfile->getMaxAge();
        $name = $pProfile->getFullName();
        
        foreach ($profiles as $profile) {
            if (!($profile->getFullName() == $name)) {
                // Determine if a profile matches the user's search criteria.
                $isSexOkayForMe = isCompatibleSex($desired, $profile->getSex());
                // Determine if the user's profile matches the other's search critiera.
                $isSexOkayForOther = isCompatibleSex($profile->getDesiredSex(), $sex);
                // Is the other profile's age a match for the user?
                $isAgeMatchForMe = isCompatibleAge($minAge, $maxAge, $profile->getAge());
                // Is the user's age a match for the other's profile?
                $isAgeMatchForOther = isCompatibleAge($profile->getMinAge(), $profile->getMaxAge(), $age);
                // If all of these are true, we have found a compatible profile.
                if ($isSexOkayForMe && $isAgeMatchForMe && $isSexOkayForOther && $isAgeMatchForOther) {
                    array_push($matches, $profile);
                }
            }
        }
        return $matches;
    }


    function isCompatibleSex($pDesiredSex, $pOtherSex) {
        $pattern = "/" . $pOtherSex . "/";
        if (preg_match($pattern, $pDesiredSex)) {
            return true;
        }
        return false;
    }

    
    function isCompatibleAge($pMinAge, $pMaxAge, $pOtherAge) {
        if ($pMinAge <= $pOtherAge && $pOtherAge <= $pMaxAge) {
            return true;
        }
        return false;
    }

?>