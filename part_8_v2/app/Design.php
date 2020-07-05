<?php
namespace Main;

use Main\App;

class Design {

    public static function setBody() : void {
        echo '<div class="main-container">';
    }
    
    public static function finishBody() : void {
        echo '</div>';
    }
    
    public static function setHeader() : void {
        echo '<div class="header">';
        echo '<div><img class="image" src="pictures/bank.jpg" alt="bank"></div>';
        echo '<div class="header-text">';
        echo '<h2>Čiupčius and Griebčius Inc.</h2>';
        echo '<div>Give Us All Of Your Money NOW!!!</div>';
        echo '</div>';
        echo '<div><img class="image" src="pictures/money.jpg" alt="money"></div>';
        echo '</div>';
    }
    
    public static function setFooter() : void {
        echo '<div class="footer">';
        echo '<div>Grab-All Brothers: We Love Your Money And NOT You!!!</div>';
        echo '<div>&copy; 2020 Corona Edition</div>';
        echo '</div>';
    }
    
    public static function setMenu(bool $link_to_list = false, bool $link_to_new = false) : void {
        echo '<div class="menu">';
        echo '<a href="' . App::URL . 'logout" class="menu-item">LOGOUT</a>';
        if ($link_to_list) echo '<a href="' . App::URL . 'list" class="menu-item">Account List</a>';
        if ($link_to_new) echo '<a href="' . App::URL . 'new" class="menu-item">Create New Account</a>';
        echo '</div>';
    }
    
    public static function successMessage(string $message = '') : string {
        return '<div class="success message">' . $message . '</div>';
    }
    
    public static function failureMessage(string $message = '') : string {
        return '<div class="failure message">' . $message . '</div>';
    }

}