<?php
trait Update {
    public function makeBoom() {
        return array(
            parent::makeBoom(),
            "M134 7.62mm Minigun",
            "2 x FN F2000 Tactical",
            "Sidewinder \"Ex-Wife\" Self-Guided Missile",
            "M24 Shotgun",
            "Milkor MGL 40mm Grenade Launcher"
        );
    }
}
