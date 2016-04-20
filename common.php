<?php
    function getHead() {
        return (
        '<head>
            <title>GeekLuv</title>

            <meta charset="utf-8" />

            <!-- instructor-provided CSS and JavaScript links; do not modify -->
            <link href="heart.gif" type="image/gif" rel="shortcut icon" />
            <link href="Geekluv.css" type="text/css" rel="stylesheet" />
        </head>'
        );
    }

    function getHeader() {
        return (
            '<div id="bannerarea">
                <img src="nerdxing.jpg" alt="banner logo" /> <br />
                where meek geeks meet
            </div>'
        );
    }

    function getFooter() {
        return (
            '<div>
                <p>
                    This page is for single nerds to meet and date each other!  Type in your personal information and wait for the nerdly luv to begin!  Thank you for using our site.
                </p>

                <p>
                    Results and page (C) Copyright Geekluv Inc.
                </p>

                <ul>
                    <li>
                        <a href="geekluv.php">
                            <img src="back.gif" alt="icon" />
                            Back to front page
                        </a>
                    </li>
                </ul>
            </div>'
        );
    }
?>