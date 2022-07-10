<?php
    if(isset($_GET['heading'])){
        $heading = $_GET['heading'];
    } else {
        $heading = '';
    }

    switch ($heading) {
        case 'teaware':
            $heading = 'Teaware';
            $headingImg = 'img/headings/chinese_teaware_heading.jpg';
            break;
        
        case 'tea':
            $heading = 'Tea';
            $headingImg = 'img/headings/green_hills_heading.jpg';
            break;

        case 'store':
            $heading = 'FoxTeaHouse - Store';
            $headingImg = 'img/headings/dark_teaware_heding.jpg';
            break;

		case 'profile':
			$heading = 'Hello ' .  $_SESSION['username'];
			$headingImg = 'img/headings/cup_and_flower_heading.jpg';
			$subHeding = '';
			break;

        default:
            $heading = 'Welcome to FoxTeaHouse';
            $headingImg = 'img/headings/green_tea_heading.jpg';
            break;
    }

    echo('
        <header class="page_header">
            <img src="' . $headingImg . '"  class="img-fluid" alt="' . $headingImg . '">

            <div>
                <h1>' . $heading . '</h1>
            </div>
        </header>
    ');
?>