<?php
// config/options.php

return array(
    array(
        "id" => "general",
        "label" => "General",
        "icon" => "fa-cubes",
        "fields" => array(
            array(
                "type" => "text",
                "id" => "site_name",
                "label" => "Site Name",
                "description" => "Enter your site name",
                "icon" => "fa-globe",
                "validation" => 'required|min:10'
            ),
            array(
                "type" => "text",
                "id" => "site_slogan",
                "label" => "Site Slogan",
                "description" => "Enter site slogan",
                "validation" => 'required'
            ),
            array(
                "type" => "timepicker",
                "id" => "backup_time",
                "label" => "Backup Time",
                "description" => "Set db backup time",
                "validation" => 'required'
            )

        )
    ),
    array(
        "id" => "social",
        "label" => "Social",
        "icon" => "fa-globe",
        "fields" => array(
            array(
                "type" => "text",
                "id" => "fb_link",
                "label" => "Facebook",
                "description" => "Enter facebook link",
                "icon" => "fa-facebook-square"
            ),
            array(
                "type" => "text",
                "id" => "twitter_link",
                "label" => "Twitter",
                "description" => "Enter twitter link",
                "icon" => "fa-twitter-square"
            )
        )
    )
);