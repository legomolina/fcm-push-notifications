<?php

namespace FCMPushNotifications;

class FCMNotification implements \JsonSerializable
{
    private $title;
    private $message;
    private $icon;
    private $sound;

    public function __construct($title, $message, $icon = "", $sound = "")
    {
        $this->title = $title;
        $this->message = $message;
        $this->icon = $icon;
        $this->sound = $sound;
    }

    public function jsonSerialize()
    {
        return [
            "title" => $this->title,
            "message" => $this->message,
            "icon" => $this->icon,
            "sound" => $this->sound
        ];
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }

    public function getSound() {
        return $this->sound;
    }

    public function setSound($sound) {
        $this->sound = $sound;
    }
}
