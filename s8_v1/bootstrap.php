<style><?php include './main.css'; ?></style>
<?php
session_start();

$data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);

function setBody() {
    echo '<div class="main-container">';
}

function finishBody() {
    echo '</div>';
}

function setHeader() {
    echo '<div class="header">';
    echo '<div><img class="image" src="bank.jpg" alt="bank"></div>';
    echo '<div class="header-text">';
    echo '<h2>Čiupčius and Griebčius Inc.</h2>';
    echo '<div>Give Us All Of Your Money NOW!!!</div>';
    echo '</div>';
    echo '<div><img class="image" src="money.jpg" alt="money"></div>';
    echo '</div>';
}

function setFooter() {
    echo '<div class="footer">';
    echo '<div>Grab-All Brothers: We Love Your Money And NOT You!!!</div>';
    echo '<div>&copy; 2020 Corona Edition</div>';
    echo '</div>';
}

function setMenu(
    bool $link_to_list = false,
    bool $link_to_new = false
) {
    echo '<div class="menu">';
    echo '<a href="./index.php?logout" class="menu-item">LOGOUT</a>';
    if ($link_to_list) {
        echo '<a href="./list.php" class="menu-item">Account List</a>';
    }
    if ($link_to_new) {
        echo '<a href="./new.php" class="menu-item">Create New Account</a>';
    }
    echo '</div>';
}

function successMessage(string $message = '') {
    echo '<div class="success message">' . $message . '</div>';
}

function failureMessage(string $message = '') {
    echo '<div class="failure message">' . $message . '</div>';
}