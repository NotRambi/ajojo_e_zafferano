<!DOCTYPE html>
<html lang="it">
<?php session_start();?>    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="librerie/style/swiper-bundle.min.css">
        <!-- Swiper JS -->
        <script src="librerie/script/swiper-bundle.min.js"></script>
        

        <title>Ajojo & Zafferano</title>
        <link rel="icon" href="logo.png" type="image/x-icon">
        <style>

            *{
                font-family: "Poppins", sans-serif;
            }
            body{
                background-color: #f8fadd;
                min-height: 100vh;
                min-width: 582px;
                margin: 0;
                padding: 0;
            }
            .ajojotitolo{
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 600%;
                margin: 0;
                padding: 0;
            }
            @media (max-width: 1250px){
                .ajojotitolo{
                    font-size: 400%;
                }
            }
            @media (max-width: 840px){
                .ajojotitolo{
                    font-size: 300%;
                }
            }
            @media (max-width: 640px){
                .ajojotitolo{
                    font-size: 250%;
                }
            }
            .ajojodesc{
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 300%;
                margin: 0;
                padding: 0;
            }
            @media (max-width: 1250px){
                .ajojodesc{
                    font-size: 200%;
                }
            }
            @media (max-width: 840px){
                .ajojodesc{
                    font-size: 150%;
                }
                
            }
            .ajojodescmin{
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 200%;
                margin: 0;
                padding: 0;
            }
            @media (max-width: 1000px){
                .ajojodescmin{
                    font-size: 150%;
                }
            }
            @media (max-width: 640px){
                .ajojodescmin{
                    font-size: 120%;
                }
            }
            .ajojoconsigliati{
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 300%;
                margin: 0;
                padding: 0;
            }
            @media (max-width: 1000px){
                .ajojoconsigliati{
                    font-size: 200%;
                }
            }
            .background-div{
                background-color: rgb(254, 244, 200);
                width: 100%;
                margin-left: 0;
                left: 0;
            }
            .background-chiaro{
                width: 100%;
                margin-left: 0;
                left: 0;
            }
            .material-symbols-outlined {
                font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
            }

            /* stili nav */
            .navbgr{
                background-color: #f8fadd;
                height: 5rem;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 10;
            }
            .nav{
                background-color: #333;
                height: 4.5rem;
                width: 98%;
                position: relative;
                top: 1rem;
                left: 1%;
                text-align: left;
                display: flex;
                align-items: center;
                border-radius: 10px;
                gap: 1.5rem;
            }
            .nav a{
                font-weight: 500;
                font-style: normal;
                font-size: 30px;
                position: relative;
                border-radius: 10px;
                color: white;
                text-decoration: none;
                transition: all 0.2s;
            }
            .nav a:not(.MainLogo){
                padding:1.2rem 0;
            }
            .nav a:not(.MainLogo):hover{
                text-decoration: underline; 
                scale: 1.1;
                transition: all 0.5s;
            }
            .nav a:is(.MainLogo):hover{
                cursor: pointer;    
                margin-right: 1.5rem;
                transition: all 0.5s;
                .logo_img{
                    scale: 0.8;
                    transition: all 0.5s;
                }
                .logo_title {
                    left:0;
                    color: white;
                    transition: all 0.5s;
                }
                .logo_title p{
                    color: white;
                    transition: all 0.2s;
                }
            }
            .ProfiloLink{
                margin-left: auto;
                margin-right: 1.5rem;
            }
            .MainLogo{
                margin-left: 1rem;
                margin-right: -6.5rem;
                display: flex;
                gap:0.2rem;
                align-items: center;
                justify-content: center;
                transition: all 0.5s;
            }
            .logo_img{
                z-index: 2;
                width: 70px;
                height: 70px;
                transition: all 0.5s;
                pointer-events: none;
            }
            .logo_title{
                position: relative;
                left:-5rem;
                transition: all 0.5s;
                pointer-events: none;
            }
            .logo_title p{
                display: flex;
                flex-direction: column;
                gap: 0rem;
                margin:0;
                margin-right: 1rem;   
                padding:0;
                top:0;
                bottom:0;
                font-size: 20px;
                position: relative;
                color:#333;
                transition: all 0.2s;
            }
            .logo_title .ajojo_{
                top:0.3rem
            }
            .logo_title .zafferano_{
                top: -0.3rem;
                left: 1.5rem;
            }

            /* stili corpo sito */
            .consigliati-div{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .cucinaRomana-div{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .piattiPesce-div{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .title-section{
                text-align: center;
            }
            .linea1{
                display: flex;
                justify-content: center;
                align-items: center;
                border: none;
                height: 8px;
                max-width: 55%; /* da decidere la larghezza giusta*/
                background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
                margin: 20px auto;
            }
            .linea2{
                display: flex;
                justify-content: center;
                align-items: center;
                border: none;
                height: 5px;
                max-width: 40%; /* da decidere la larghezza giusta*/
                background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
                margin: 20px auto;
            }

            /* stile della sezione Hai voglia di */
            .categorie-div{
                display: grid;
                grid-template-columns: max-content max-content max-content max-content max-content;
                gap: 3rem 2rem; /* gap tra righe, tra colonne */
                justify-content: center;
                text-align: center;
                margin-top: 1rem;
            }
            .categorie-div a{
                font-size: 160%;
                font-weight: 500;
                color: #000;
                text-decoration: underline;
                transition: all 0.3s;
            }
            .categorie-div a:hover{
                scale: 1.1;
                cursor:pointer;
                transition: all 0.3s;
            }
            @media (max-width: 1000px){
                .categorie-div{
                    gap: 2rem 1rem;
                }
                .categorie-div a{
                    font-size: 140%;
                }
            }
            @media (max-width: 640px){
                .categorie-div{
                    gap: 2rem 1rem;
                }
                .categorie-div a{
                    font-size: 120%;
                }
            }

            /* SLIDER */
            .slide-container{
                max-width: 1400px;
                width: 100%;
                padding: 30px 0;
                padding-top:0;
                margin-bottom:0;
            }
            .slide-content-style_mini{
                padding: 30px 14px;
                margin: 0 10px;  
                overflow: hidden; 
            }
            .card_mini{
                width: 250px;
                height: 215px;
                border-radius: 5%;
                display: flex;
                flex-direction: column;
                align-items: center;
                cursor: pointer;
                transition: all 0.2s;
            }
            .card-border_mini{
                width: 250px;
                height: 215px;
                border-radius: 5%;
                background-color: white;
                border: 2px solid #333;
                display: flex;
                flex-direction: column;
                align-items: center;
                box-shadow: 2px 10px 10px gray;
            }
            .card_mini:hover{
                scale: 1.03;
                transition: all 0.2s;
            }
            .image-content{
                margin-top: 2.5%;
                margin-left: 2.5%;
            }
            .card-image_mini{
                position: relative;
                width: 95%;
                height: auto;
                border-radius: 5%;
            }
            .card-image_mini .card-img_mini{
                height: 100%;
                width: 100%;
                object-fit: cover;
                border-radius: 5%;
                border: 2px solid gray;
            }
            .card-content_mini{
                width: 94%;
                height: 2rem;
                position: relative;
                bottom:6px;
                text-align: left;
                display: flex;
                align-items: center;
                gap: 0.7rem;
                margin-top: 0.2rem;
            }
            .name{
                font-size: 22px;
                font-weight: 600;
                color: black;
            }
            .name_mini{
                font-size: 15px;
                font-weight: 600;
                color: black;
            }
            .timer_mini{
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 0.2rem;
                scale:0.8;
            }
            .flag{
                position: relative;
                margin-left: auto;
            }
            .swiper-BtnDiv{
                margin-top:-12rem;
                text-align: left;
                display: flex;
                align-items: center;
            }
            .swiper-navBtn{
                z-index: 5;
                color: #333;
                transition: all 0.3s ease;
                position: relative;
            }
            .swiper-navBtn:hover{
                color: #222;
                scale: 1.1;
            }
            .swiper-button-next{
                margin-left:auto;
            }
            .swiper-button-prev{
                margin-left:0;
            }
            .swiper-pagination{
                z-index: 5;
                position: relative;
                margin-top:12rem;
            }
            .swiper-pagination-bullet{
                background-color:#333;
                opacity: 0.5;                
            }
            .swiper-pagination-bullet-active{
                background-color:#333;
                opacity: 1;                
            }

            /* FORM LOGIN / REGISTRAZIONE */
            .modal {
                display: none;
                position: fixed;
                z-index: 11;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                background-color: rgba(0, 0, 0, 0.8);
            }
            .form {
                margin: 15% auto;
                margin-top: 0%;
                top: 15%;
                padding: 20px;
                display: flex;
                flex-direction: column;
                gap: 10px;
                max-width: 400px;
                padding: 20px;
                border-radius: 20px;
                position: relative;
                background-color: #e8e8e8;
                color: #fff;
                border: 5px solid #111;
            }
            .title {
                font-size: 28px;
                font-weight: 600;
                letter-spacing: -1px;
                position: relative;
                display: flex;
                align-items: center;
                padding-left: 30px;
                color: #ed6700;
            }
            .title::before {
                width: 18px;
                height: 18px;
            }
            .title::after {
                width: 18px;
                height: 18px;
                animation: pulse 1s linear infinite;
            }
            .title::before,
            .title::after {
                position: absolute;
                content: "";
                height: 16px;
                width: 16px;
                border-radius: 50%;
                left: 0px;
                background-color: #ed6700;
            }
            .errorLabelLogin{
                display: none;
                color: #ed4f00;
                margin:0;
            } 
            .errorLabelSignin{
                display: none;
                color: #ed4f00;
                margin:0;
            }
            .message, 
            .signin {
                font-size: 14.5px;
                color: #333;
            }
            .signin {
                text-align: center;
            }
            .signin a {
                color: #ed6700;
                text-decoration: none;
            }
            .signin a:hover {
                text-decoration: underline;
            }
            .flex {
                display: flex;
                width: 97.5%;
                gap: 20px;
            }
            .form label {
                position: relative;
            }
            .form label .input {
                background-color: #fff;
                color: #333;
                width: 95%;
                padding: 20px 05px 05px 10px;
                outline: 0;
                border: 1px solid rgba(105, 105, 105, 0.397);
                border-radius: 10px;
            }
            .form label .input + span {
                color: #333;
                position: absolute;
                left: 10px;
                top: 0px;
                font-size: 0.9em;
                cursor: text;
                transition: 0.3s ease;
            }
            .form label .input:placeholder-shown + span {
                top: 12.5px;
                font-size: 0.9em;
            }
            .form label .input:focus + span,
            .form label .input:valid + span {
                color: #ed6700;
                top: 0px;
                font-size: 0.7em;
                font-weight: 600;
            }
            .input {
                font-size: medium;
            }
            .submit {
                border: none;
                outline: none;
                padding: 10px;
                border-radius: 10px;
                color: #fff;
                font-size: 16px;
                transform: .3s ease;
                background-color: #ed6700;
                transition: all 0.3s ease;
            }
            .submit:hover {
                background-color: #ed4f00;
                transition: all 0.3s ease;
            }
            @keyframes pulse {
                from {
                    transform: scale(0.9);
                    opacity: 1;
                }

                to {
                    transform: scale(1.8);
                    opacity: 0;
                }
            }

            /* style carte */
            @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap");

            
            img {
                width: 100%;
                height: 100%;
                display: flex;
            }
            .titolocarte {
                font-size: 28px;
                font-weight: 600;
                letter-spacing: -1px;
                position: relative;
                display: flex;
                align-items: center;
                color: orange;
            }
            @media (max-width: 800px){
                .titolocarte{
                    font-size: 18px;
                }
            }
            .carte-div{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .container-carte {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                width: 1320px;
                height: 550px;
                gap: 5px;
                margin: 1rem;
                
                
            }
            @media (max-width: 800px){
                .container-carte{
                    height: 450px;
                }
            }
            .carta {
                min-width: 70px;
                height: 100%;
                border-radius: 30px;
                overflow: hidden;
                display: flex;
                align-items: flex-end;
                flex-grow: 1;
                cursor: pointer;
                position: relative;
                transition: flex-grow 0.5s cubic-bezier(0.16, 1, 0.3, 1);
                --transition-timing: 0.35s;
                box-shadow: 2px 10px 10px gray;
            }
            .carta.active {
                flex-grow: 100;
            } 
            .carta:hover {
                flex-grow: 7;
            }
            .carta > .background {
                position: absolute;
                inset: 0;
                object-fit: cover;
                object-position: center;
                filter: brightness(0.4);
                z-index: -1;
                transition: var(--transition-timing) ease;
            }
            .carta:hover > .background {
                filter: brightness(1);
            }
            .carta > .carta-content {
                display: flex;
                align-items: center;
                position: absolute;
                left: 10px;
                right: 10px;
                bottom: 20px;
                overflow: hidden;
                transition: var(--transition-timing);
                z-index: 5;
            }
            .carta:hover > .carta-content {
                inset: 20px;
                top: auto;
            }
            .carta-content > * {
                transition: var(--transition-timing);
            }
            .carta-content > .profile-image {
                min-width: 50px;
                max-width: 50px;
                height: 50px;
                border: 1px solid white;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
                overflow: hidden;
            }
            .carta:hover .profile-image {
                border: 1px solid rgb(110, 252, 205);
            }
            .profile-image > svg {
                stroke: #fefefe;
                color: white;
            }
            .profile-image > span{
                stroke: #fefefe;
                color: white;
            }
            .carta:hover .profile-image > svg {
                stroke: rgb(110, 252, 205);
            }
            .carta-content > .titolocarte {
                white-space: pre;
                margin-left: 5px;
                translate: 0 100%;
                opacity: 0;
            }
            .carta:hover .titolocarte {
                opacity: 1;
                translate: 0 0;
            }
            .carta > .backdrop {
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
                height: 200px;
                z-index: 0;
                background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.7));
            }

            /* classi div michelin */

            /* container 1 */

            .michelincontainer1{
                max-width: 100%;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 50px; 
            }
            .michelintesto1{
                order: 1;
                max-width: 50%;
                text-align: left;
            }
            .michelincontainer1 img {
                max-width: 300px;
                height: auto;
                align-items: center;
                justify-content: center;
                max-width: 50;
                order: 0;
                border-radius: 5%;
            }
        
            .michelincontainer1 p {
                font-size: 20px;
                text-wrap: balance;
                margin: 0;
                padding: 0;
            }

            .michelincontainer1 h3 {
                text-wrap: balance;
                margin: 0;
                padding: 0;
                margin-bottom: 0.7rem;

            }

        
            @media (max-width: 1000px) {
                .michelincontainer1 {
                    flex-direction: column;
                    align-items: center;   
                    justify-content: center;
                }
                .michelincontainer1 img{
                    max-width: 60%;
                    order: 0;
                }
                .michelintesto1{
                    max-width: 80%;
                    order: 1;
                    text-align: center;
                }
            }

            /* container 2 */

            .michelincontainer2{
                max-width: 100%;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 50px; 
            }
            .michelintesto2{
                order: 0;
                max-width: 50%;
                text-align: right;
            }
            .michelincontainer2 img {
                max-width: 300px;
                height: auto;
                align-items: center;
                justify-content: center;
                max-width: 50;
                order: 1;
                border-radius: 5%;
            }
        
            .michelincontainer2 p {
                font-size: 20px;
                text-wrap: balance;
                margin: 0;
                padding: 0;
            }

            .michelincontainer2 h3 {
                text-wrap: balance;
                margin: 0;
                padding: 0;
                margin-bottom: 0.7rem;

            }

        
            @media (max-width: 1000px) {
                .michelincontainer2 {
                    flex-direction: column;
                    align-items: center;   
                    justify-content: center;
                }
                .michelincontainer2 img{
                    max-width: 60%;
                    order: 0;
                }
                .michelintesto2{
                    max-width: 80%;
                    order: 1;
                    text-align: center;
                }
            }

            

            /* container 3 */

            .michelincontainer3{
                max-width: 100%;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 50px; 
            }
            .michelintesto3{
                order: 1;
                max-width: 50%;
                text-align: left;
            }
            .michelintesto3 a{
                text-decoration: underline;
                cursor: pointer;
                font-weight: bold;
            }
            .michelincontainer3 img {
                max-width: 300px;
                height: auto;
                align-items: center;
                justify-content: center;
                max-width: 50;
                order: 0;
                border-radius: 5%;
            }
        
            .michelincontainer3 p {
                font-size: 20px;
                text-wrap: balance;
                margin: 0;
                padding: 0;
            }

            .michelincontainer3 h3 {
                text-wrap: balance;
                margin: 0;
                padding: 0;
                margin-bottom: 0.7rem;

            }

        
            @media (max-width: 1000px) {
                .michelincontainer3 {
                    flex-direction: column;
                    align-items: center;   
                    justify-content: center;
                }
                .michelincontainer3 img{
                    max-width: 60%;
                    order: 0;
                }
                .michelintesto3{
                    max-width: 80%;
                    order: 1;
                    text-align: center;
                }
            }

            /* container sezioni scelta ingredienti */

            /*container 1*/ 

            .ingredienticontainer1{
                max-width: 100%;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 50px; 
            }
            .ingredientitesto1{
                order: 0;
                max-width: 50%;
                text-align: right;
            }
            .ingredienticontainer1 img {
                max-width: 300px;
                height: auto;
                align-items: center;
                justify-content: center;
                max-width: 50;
                order: 1;
                border-radius: 5%;
            }
        
            .ingredienticontainer1 p {
                font-size: 20px;
                text-wrap: balance;
                margin: 0;
                padding: 0;
            }

            .ingredienticontainer1 h3 {
                text-wrap: balance;
                margin: 0;
                padding: 0;
                margin-bottom: 0.7rem;

            }

        
            @media (max-width: 1000px) {
                .ingredienticontainer1 {
                    flex-direction: column;
                    align-items: center;   
                    justify-content: center;
                }
                .ingredienticontainer1 img{
                    max-width: 60%;
                    order: 0;
                }
                .ingredientitesto1{
                    max-width: 80%;
                    order: 1;
                    text-align: center;
                }
            }

            /* container 2 */

            .ingredienticontainer2{
                max-width: 100%;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 50px; 
            }
            .ingredientitesto2{
                order: 1;
                max-width: 50%;
                text-align: left;
            }
            .ingredienticontainer2 img {
                max-width: 300px;
                height: auto;
                align-items: center;
                justify-content: center;
                max-width: 50;
                order: 0;
                border-radius: 5%;
            }
        
            .ingredienticontainer2 p {
                font-size: 20px;
                text-wrap: balance;
                margin: 0;
                padding: 0;
            }

            .ingredienticontainer2 h3 {
                text-wrap: balance;
                margin: 0;
                padding: 0;
                margin-bottom: 0.7rem;

            }

        
            @media (max-width: 1000px) {
                .ingredienticontainer2 {
                    flex-direction: column;
                    align-items: center;   
                    justify-content: center;
                }
                .ingredienticontainer2 img{
                    max-width: 60%;
                    order: 0;
                }
                .ingredientitesto2{
                    max-width: 80%;
                    order: 1;
                    text-align: center;
                }
            }

            

            /* container 3 */

            .ingredienticontainer3{
                max-width: 100%;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 50px; 
            }
            .ingredientitesto3{
                order: 0;
                max-width: 50%;
                text-align: right;
            }
            .ingredienticontainer3 img {
                max-width: 300px;
                height: auto;
                align-items: center;
                justify-content: center;
                max-width: 50;
                order: 1;
                border-radius: 5%;
            }
        
            .ingredienticontainer3 p {
                font-size: 20px;
                text-wrap: balance;
                margin: 0;
                padding: 0;
            }

            .ingredienticontainer3 h3 {
                text-wrap: balance;
                margin: 0;
                padding: 0;
                margin-bottom: 0.7rem;

            }

        
            @media (max-width: 1000px) {
                .ingredienticontainer3 {
                    flex-direction: column;
                    align-items: center;   
                    justify-content: center;
                }
                .ingredienticontainer3 img{
                    max-width: 60%;
                    order: 0;
                }
                .ingredientitesto3{
                    max-width: 80%;
                    order: 1;
                    text-align: center;
                }
            }

            /* ultima sezione */

            .lastSection{
                padding: 2rem;
                background-color: #333;
                color: #fff;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                text-wrap: balance;
                text-align: left;
            }
            .colonnaIlSito{
                border-right: 2px solid #000;
                border-image: linear-gradient(rgb(0,0,0,0), rgb(0,0,0,0.7), rgb(0,0,0,0)) 10;
                padding: 0 1rem;
            }
            .colonnaChiSiamo{
                border-right: 2px solid #000;
                border-image: linear-gradient(rgb(0,0,0,0), rgb(0,0,0,0.7), rgb(0,0,0,0)) 10;
                padding: 0 1rem;
            }
            .colonnaInformazioni{
                padding: 0 1rem;
            }
            .LS_title{
                font-size: 30px;
                font-weight: 600;
                margin-bottom: 1rem;
                text-align: center;
            }
            .LS_text{
                font-size: 15px;
                text-align: center;
            }
            .LS_text a{
                color: #fff;
            }
            .LS_text2{
                font-size: 15px;
                text-align: center;
            }
            .LS_text2 p{
                margin:0;
                padding:0;
            }
            .listaNomi{
                display: inline-block;
                text-align: left;
            }
            @media(max-width: 1200px){
                .lastSection{
                    grid-template-columns: 1fr;
                }
                .colonnaIlSito{
                    border-right: none;
                    border-bottom: 2px solid #000;
                    border-image: linear-gradient(to right, rgb(0,0,0,0), rgb(0,0,0,0.7), rgb(0,0,0,0)) 10;
                }
                .colonnaChiSiamo{
                    border-right: none;
                    border-bottom: 2px solid #000;
                    border-image: linear-gradient(to right, rgb(0,0,0,0), rgb(0,0,0,0.7), rgb(0,0,0,0)) 10;
                }
            }
            
        </style>
    </head>
    <body>

        <div id="destinazione0"></div>

        <!-- div barra di navigazione -->

        <div class="navbgr">
            <div class="nav">
                <a class="MainLogo" id="scroll0">
                    <img src="logo.png" class="logo_img">
                    <div class="logo_title">
                        <p class="ajojo_">Ajojo &</p>
                        <p class="zafferano_">Zafferano</p>
                    </div>
                </a>
                <a class="FrigoLink" href="frigo.php">Frigorifero</a>
                <a class="RicettarioLink" href="ricettario.php">Ricettario</a>
                <a class="ProfiloLink" id="profileBtn" href="profilo.php">Profilo</a>
                <a class="ProfiloLink" id="loginBtn" href="#">Accedi</a>
            </div>
        </div>

        <?php
        if(isset($_SESSION['user'])){
            echo "<script>document.getElementById('profileBtn').style.display = 'block';</script>";
            echo "<script>document.getElementById('loginBtn').style.display = 'none';</script>";
        } 
        else{
            echo "<script>document.getElementById('profileBtn').style.display = 'none';</script>";
            echo "<script>document.getElementById('loginBtn').style.display = 'block';</script>";
        }
        ?>
        

        
        <br><br><br><br><br><br>

        <!-- titolo e descrizione index -->

        <p class="ajojotitolo">𝓐𝓙𝓞𝓙𝓞 & 𝓩𝓐𝓕𝓕𝓔𝓡𝓐𝓝𝓞</p>
        <p class="ajojodesc">𝑳𝒂 𝑺𝒆𝒎𝒑𝒍𝒊𝒄𝒊𝒕𝒂' 𝒅𝒆𝒍 𝑪𝒐𝒎𝒑𝒍𝒆𝒔𝒔𝒐</p>
        <br>
        <hr class="linea1">
        <br>
        <p class="ajojodesc">𝑺𝒄𝒐𝒑𝒓𝒊 𝒕𝒖𝒕𝒕𝒐 𝒄𝒊𝒐' 𝒄𝒉𝒆 𝑨𝒃𝒃𝒊𝒂𝒎𝒐 𝒅𝒂 𝑶𝒇𝒇𝒓𝒊𝒓𝒕𝒊</p>

        

        <br><br><br>

        <!-- codice carte index -->

        <div class="carte-div">
            <div class="container-carte">
                <div id="scroll1" class="carta">
                    <img class="background" src="./immaginiindex/antico-ricettario.jpg" alt="">

                    <div class="carta-content">
                        <div class="profile-image">
                            <span class="material-symbols-outlined"> menu_book </span>
                        </div>
                        <h3 class="titolocarte">Ricettario</h3>
                    </div>
                    <div class="backdrop"></div>
                </div>

                <div id="scroll2" class="carta">
                    <img class="background" src="./immaginiindex/piatti-del-momento.jpg" alt="">

                    <div class="carta-content">
                        <div class="profile-image">
                            <span class="material-symbols-outlined"> restaurant </span>
                        </div>
                        <h3 class="titolocarte">Piatti Del Momento</h3>
                    </div>
                    <div class="backdrop"></div>
                </div>

                <div id="scroll3" class="carta">
                    <img class="background" src="./immaginiindex/michelin.jpg" alt="">

                    <div class="carta-content">
                        <div class="profile-image">
                        <span class="material-symbols-outlined"> filter_vintage </span>
                        </div>
                        <h3 class="titolocarte">Michelin</h3>
                    </div>
                    <div class="backdrop"></div>
                </div>

                <div id="scroll4"class="carta">
                    <img class="background" src="./immaginiindex/ingredienti-qualita.jpg" alt="">

                    <div class="carta-content">
                        <div class="profile-image">
                            <span class="material-symbols-outlined"> grocery </span>
                        </div>
                        <h3 class="titolocarte">Scelta degli Ingredienti</h3>
                    </div>
                    <div class="backdrop"></div>
                </div>

                <div id="scroll5" class="carta">
                    <img class="background" src="./immaginiindex/piatto-logo-index.jpg" alt="">

                    <div class="carta-content">
                        <div class="profile-image">
                            <span class="material-symbols-outlined"> more_horiz </span>
                        </div>
                        <h3 class="titolocarte">More</h3>
                    </div>
                    <div class="backdrop"></div>
                </div>
            </div>
        </div>

        <div id="destinazione1"></div>
        <br>

        <!-- div hai voglia di... -->

        <div class="background-div"> 
            <br><br><br>
            <p class="ajojoconsigliati">𝑯𝒂𝒊 𝒗𝒐𝒈𝒍𝒊𝒂 𝒅𝒊...</p>
            <hr class="linea2">
            <p class="ajojodescmin">𝒔𝒄𝒆𝒈𝒍𝒊 𝒍𝒂 𝒄𝒂𝒕𝒆𝒈𝒐𝒓𝒊𝒂 𝒄𝒉𝒆 𝒑𝒓𝒆𝒇𝒆𝒓𝒊𝒔𝒄𝒊, 𝒂𝒍</p>
            <p class="ajojodescmin">𝒓𝒆𝒔𝒕𝒐 𝒄𝒊 𝒑𝒆𝒏𝒔𝒊𝒂𝒎𝒐 𝒏𝒐𝒊</p>
            <br><br>
            <div class="categorie-div">
                <a onclick="selezionaPortata('antipasto')" class="link-antipasti">Antipasti</a>
                <a onclick="selezionaPortata('primo')" class="link-primi">Primi</a>
                <a onclick="selezionaPortata('secondo')" class="link-secondi">Secondi</a>
                <a onclick="selezionaPortata('contorno')" class="link-contorni">Contorni</a>
                <a onclick="selezionaPortata('dolce')" class="link-dolci">Dolci</a>
                <a onclick="selezionaFiltro('flagPiccante')" class="link-piccante">Piccante</a>
                <a onclick="selezionaFiltro('flagLeggero')" class="link-leggero">Leggero</a>
                <a onclick="selezionaFiltro('flagGlutine')" class="link-senzaGlutine">GlutenFree</a>
                <a onclick="selezionaFiltro('flagStar')" class="link-stellato">Stellato</a>
                <a onclick="selezionaFiltro('flagVegan')" class="link-vegano">Vegano</a>
            </div>
            <br><br><br><br>
        </div>

        <div id="destinazione2"></div>
        <br><br>

        <!-- div piatti consigliati -->

        <div class= "background_chiaro">
            <br><br>
            <p class="ajojoconsigliati">𝑷𝒊𝒂𝒕𝒕𝒊 𝒅𝒆𝒍 𝑴𝒐𝒎𝒆𝒏𝒕𝒐</p>
            <hr class="linea2">
            <p class="ajojodescmin">𝒔𝒄𝒆𝒈𝒍𝒊 𝒕𝒓𝒂 𝒖𝒏𝒂 𝒗𝒂𝒔𝒕𝒂 𝒈𝒂𝒎𝒎𝒂 𝒅𝒊 𝒑𝒊𝒂𝒕𝒕𝒊 𝒔𝒆𝒍𝒆𝒛𝒊𝒐𝒏𝒂𝒕𝒊</p>
            <p class="ajojodescmin">𝒆 𝒑𝒆𝒓𝒇𝒆𝒕𝒕𝒊 𝒑𝒆𝒓 𝒄𝒉𝒊 𝒆' 𝒊𝒏 𝒄𝒆𝒓𝒄𝒂 𝒅𝒊 𝒊𝒔𝒑𝒊𝒓𝒂𝒛𝒊𝒐𝒏𝒆</p>
            
            <br><br><br><br><br><br>

            <!-- slider carte consigliati -->

            <h1 class="title-section">Piatti Consigliati</h1>
            <div class="consigliati-div">
                <div class="slide-container">
                    <div class="slide-content1 slide-content-style_mini">
                        <div class="card-wrapper swiper-wrapper">
                            
                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/straccetti_alle_olive_taggiasche.jpg" alt="" class="card-img_mini"  id="straccetti_alle_olive_taggiasche">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Straccetti alle Olive</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">20'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/pizzette_di_zucchine.jpg" alt="" class="card-img_mini" id="pizzette_di_zucchine">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Pizzette di Zucchine</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">20'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/gnocchi_salsiccia_e_tartufo.jpg" alt="" class="card-img_mini" id="gnocchi_salsiccia_e_tartufo">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Gnocchi al Tartufo</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">30'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/pasta_alla_norma.jpg" alt="" class="card-img_mini" id="pasta_alla_norma">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Pasta alla Norma</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">45'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/tiramisu.jpg" alt="" class="card-img_mini" id="tiramisu">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Tiramisu</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">60'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/panzerotti_fritti.jpg" alt="" class="card-img_mini" id="panzerotti_fritti">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Panzerotti Napoletani</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">60'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <h1 class="title-section">Cucina Romana</h1>
            <div class="cucinaRomana-div">
                <div class="slide-container">
                    <div class="slide-content2 slide-content-style_mini">
                        <div class="card-wrapper swiper-wrapper">
                            
                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/carbonara.jpg" alt="" class="card-img_mini"  id="carbonara">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Carbonara</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">30'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/ajojo_e_peperoncino.jpg" alt="" class="card-img_mini" id="ajojo_e_peperoncino">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Ajojo e Peperoncino</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">15'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/amatriciana.jpg" alt="" class="card-img_mini" id="amatriciana">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Amatriciana</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">30'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/cacio_e_pepe.jpg" alt="" class="card-img_mini" id="cacio_e_pepe">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Cacio e Pepe</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">30'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/gricia.jpg" alt="" class="card-img_mini" id="gricia">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Gricia</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">30'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/polpette_alla_romana.jpg" alt="" class="card-img_mini" id="polpette_alla_romana">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Polpette alla Romana</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">120'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/trippa.jpg" alt="" class="card-img_mini" id="trippa">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Trippa Romana</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">80'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/puntarelle.jpg" alt="" class="card-img_mini" id="puntarelle">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Puntarelle</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">40'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/saltimbocca_alla_romana.jpg" alt="" class="card-img_mini" id="saltimbocca_alla_romana">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Saltimbocca</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">20'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <h1 class="title-section">Piatti di Pesce</h1>
            <div class="piattiPesce-div">
                <div class="slide-container">
                    <div class="slide-content3 slide-content-style_mini">
                        <div class="card-wrapper swiper-wrapper">
                            
                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/crostini_in_salsa_tonnata.jpg" alt="" class="card-img_mini"  id="crostini_in_salsa_tonnata">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Crostini salsa di Tonno</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">5'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/baccala_alla_vicentina.jpg" alt="" class="card-img_mini" id="baccala_alla_vicentina">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Baccalà alla Vicentina</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">30'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/polpette_di_pesce.jpg" alt="" class="card-img_mini" id="polpette_di_pesce">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Polpette di Pesce</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">30'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/linguine_agli_scampi.jpg" alt="" class="card-img_mini" id="linguine_agli_scampi">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Linguine agli Scampi</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">120'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/zuppa_di_pesce.jpg" alt="" class="card-img_mini" id="zuppa_di_pesce">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Zuppa_di_pesce</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">60'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/paella_de_marisco.jpg" alt="" class="card-img_mini" id="paella_de_marisco">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Paella de Marisco</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">90'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/calamarata_con_ragù_di_pesce.jpg" alt="" class="card-img_mini" id="calamarata_con_ragù_di_pesce">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Calamarata</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">30'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/fritto_misto_di_pesce.jpg" alt="" class="card-img_mini" id="fritto_misto_di_pesce">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Fritto Misto</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">40'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <h1 class="title-section">Cucina del Mondo</h1>
            <div class="consigliati-div">
                <div class="slide-container">
                    <div class="slide-content1 slide-content-style_mini">
                        <div class="card-wrapper swiper-wrapper">
                            
                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/ravioli_di_carne.jpg" alt="" class="card-img_mini"  id="ravioli_di_carne">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Gyoza</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">35'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/ratatouille.jpg" alt="" class="card-img_mini" id="ratatouille">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Ratatouille</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">50'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/roast_beef.jpg" alt="" class="card-img_mini" id="roast_beef">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Roast Beef</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">80'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/paella_alla_valenciana.jpg" alt="" class="card-img_mini" id="paella_alla_valenciana">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Paella Valenciana</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">80'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/panini_cinesi_al_vapore.jpg" alt="" class="card-img_mini" id="panini_cinesi_al_vapore">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Bun Cinesi</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">35'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_mini swiper-slide">
                                <div class="card-border_mini">
                                    <div class="image-content">
                                        <div class="card-image_mini">
                                            <img src="immaginiricette/escargot.jpg" alt="" class="card-img_mini" id="escargot">
                                        </div>
                                    </div>
                                    <div class="card-content_mini">
                                        <h2 class="name_mini">Escargot</h2>
                                        <div class="timer_mini">
                                            <span class="material-symbols-outlined">
                                                timer
                                            </span>
                                            <p class="time">180'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <div id="destinazione3"></div>

        <br><br>
        
        <!-- div stella michelin... -->

        <div class="background-div"> 
            <br><br>
            <p class="ajojoconsigliati">𝑺𝒕𝒆𝒍𝒍𝒂 𝑴𝒊𝒄𝒉𝒆𝒍𝒊𝒏</p>
            <hr class="linea2">
            <p class="ajojodescmin">𝒑𝒆𝒓 𝒄𝒉𝒊 𝒆' 𝒂𝒍𝒍𝒂 𝒓𝒊𝒄𝒆𝒓𝒄𝒂 𝒅𝒊 𝒖𝒏𝒂 𝒔𝒇𝒊𝒅𝒂</p>
            <p class="ajojodescmin">𝒐 𝒗𝒖𝒐𝒍𝒆 𝒔𝒕𝒖𝒑𝒊𝒓𝒆 𝒊 𝒑𝒓𝒐𝒑𝒓𝒊 𝒐𝒔𝒑𝒊𝒕𝒊</p>

            <br><br><br>
            
            <div class="michelincontainer1">
                <img src="immaginiindex/michelinimg1.jpg" >
                <div class="michelintesto1">
                    <h2>La Storia</h2>
                    <p>La guida Michelin viene pubblicata per la prima volta nel 1900. Essa conteneva mappe, procedure per cambiare una ruota, una lista di stazioni di servizio e una lista di ristoranti e alberghi per il pernottamento. Per due decenni queste informazioni vennero fornite gratuitamente, fino al 1920, anno in cui iniziò ad essere venduta al prezzo di 7 franchi poiché André Michelin arrivò in un negozio di gomme e trovò la sua guida utilizzata come supporto per un banco di lavoro. Di conseguenza, la guida abbandonò le inserzioni a pagamento all'interno delle proprie pagine. Poco dopo, i fratelli Michelin decisero di impiegare ispettori in incognito per visitare e recensire i ristoranti e gli alberghi.
                        Nel 1926 la guida iniziò ad assegnare le stelle agli indirizzi di alta cucina, evidenziandoli inizialmente con una sola stella e dopo cinque anni, venne introdotta la scala attuale da una a tre stelle
                    </p>
                </div>
            </div> 

            <br><br>

            <div class="michelincontainer2">
                <img src="immaginiindex/michelinverde.jpg" >
                <div class="michelintesto2">
                    <h2>Stella Verde Michelin</h2>
                    <p>
                        Oltre alla tradizionale stella Michelin, nel 2020 nasce un nuovo criterio di giudizio per il quale molti ristoratori si dedicano alla revisione delle politiche dei loro locali. La Stella Verde Michelin infatti nasce come iniziativa, da parte della Guida stessa, per incentivare la battaglia all'eco-sostenibilità del globo. Come però è subito facile giungere a conclusione, la Stella Verde porta i ristoratori a selezionare materie prime di qualità e spesso ad impatto zero, e ciò porta all'aumento generale della qualità dei prodotti serviti dai vari ristoratori. Si potrebbe dire essere una "doppia vittoria"
                    </p>
                </div>
            </div>

            <br><br>

            <div class="michelincontainer3">
                <img src="immaginiindex/ajojo-michelin.jpg" >
                <div class="michelintesto3">
                    <h2>Le Nostre Proposte</h2>
                    <p>
                        L'obiettivo principale delle proposte presenti nel nostro ricettario è quello di unire semplicità e gusto in un unico piatto. Nonostante ciò non rinneghiamo la passione per la cucina e le sfide che ci si pongono davanti durante la preparazione di un buon piatto, ed è per questo che abbiamo volutamente deciso di aggiungere alla nostra lista di portate quel tocco di complessità che ci voleva. Ma chi ha detto che per preparare un piatto degno di uno chef stellato ci sia bisogno di utilizzare decine e decine di ingredienti? Bhe, noi no di certo! Nella nostra selezione di <a onclick="selezionaFiltro('flagStar')">piatti stellati</a> troverai le invenzioni delle figure più rilevanti del mondo della cucina, ma che allo stesso tempo rispetteranno la promessa che vogliamo continuare a mantenere: la "semplicità"
                    </p>
                </div>
            </div>

            <br><br><br><br>

        </div>

        <div id="destinazione4"></div>

        <br><br>

        <div>
            <br><br>
                <p class="ajojoconsigliati">𝑺𝒄𝒆𝒍𝒕𝒂 𝒅𝒆𝒈𝒍𝒊 𝑰𝒏𝒈𝒓𝒆𝒅𝒊𝒆𝒏𝒕𝒊</p>
                <hr class="linea2">
                <p class="ajojodescmin">𝒑𝒆𝒓 𝒄𝒉𝒊 𝒆' 𝒂𝒍𝒍𝒂 𝒓𝒊𝒄𝒆𝒓𝒄𝒂 𝒅𝒊 𝒖𝒏𝒂 𝒔𝒇𝒊𝒅𝒂</p>
                <p class="ajojodescmin">𝒐 𝒗𝒖𝒐𝒍𝒆 𝒔𝒕𝒖𝒑𝒊𝒓𝒆 𝒊 𝒑𝒓𝒐𝒑𝒓𝒊 𝒐𝒔𝒑𝒊𝒕𝒊</p>
            <br><br><br><br>

            <div class="ingredienticontainer1">
                <img src="immaginiindex/michelinimg1.jpg" >
                <div class="ingredientitesto1">
                    <h2>La Storia</h2>
                    <p>La guida Michelin venne pubblicata per la prima volta nel 1900. Essa conteneva mappe, procedure per cambiare una ruota, una lista di stazioni di servizio e una lista di ristoranti e alberghi per il pernottamento. Per due decenni queste informazioni vennero fornite gratuitamente, fino al 1920, anno in cui iniziò ad essere venduta al prezzo di 7 franchi poiché André Michelin arrivò in un negozio di gomme e trovò la sua guida utilizzata come supporto per un banco di lavoro. Di conseguenza, la guida abbandonò le inserzioni a pagamento all'interno delle proprie pagine. Poco dopo, i fratelli Michelin decisero di impiegare ispettori in incognito per visitare e recensire i ristoranti e gli alberghi.
                        Nel 1926 la guida iniziò ad assegnare le stelle agli indirizzi di alta cucina, evidenziandoli inizialmente con una sola stella e dopo cinque anni, venne introdotta la scala attuale da una a tre stelle
                    </p>
                </div>
            </div> 

            <br><br>

            <div class="ingredienticontainer2">
                <img src="immaginiindex/michelinverde.jpg" >
                <div class="ingredientitesto2">
                    <h2>Stella Verde Michelin</h2>
                    <p>Oltre alla tradizionale stella Michelin, nel 2020 nasce un nuovo criterio di giudizio per il quale molti ristoratori si dedicano alla revisione delle politiche dei loro locali. La Stella Verde Michelin infatti nasce come iniziativa, da parte della Guida stessa, per incentivare la battaglia all'eco-sostenibilità del globo. Come però è subito facile giungere a conclusione, la Stella Verde porta i ristoratori a selezionare materie prime di qualità e spesso ad impatto zero, e ciò porta all'aumento generale della qualità dei prodotti serviti dai vari ristoratori. Si potrebbe dire essere una "doppia vittoria"
                    </p>
                </div>
            </div>

            <br><br>

            <div class="ingredienticontainer3">
                <img src="immaginiindex/michelinimg1.jpg" >
                <div class="ingredientitesto3">
                    <h2>La Storia</h2>
                    <p> beie efeufefue fhehfheu fjfjfjfjfjfjfjfjfjfj fjfjfjfjfjfjfjfjfjf jfjfjfjfjfjfjfjf jfjfjjuhf jf uouwyoi4uhyew4 oiy fw4g yi34 gi4g uyoiwfguyirf i  iu4 giuwr g3up9i4 gfjfjfjfjf jfjfjfjfjfjfjf jfjfjfjfjfjfjfjfjf jfjfjfjfjfjf jfjfjfjfjfjfj fjfjfjfjfjf hehfehf fhef fe feufuefue  uefuefue fefeufe</p>
                </div>
            </div>

            <br><br><br><br>

        </div>

        <!-- div contatti -->

        <div id='destinazione5'></div>
        
        <div class="lastSection">
            <div class="colonnaIlSito">
                <p class="LS_title">Il Sito</p>
                <p class="LS_text">
                    Ajojo & Zafferano è un sito web che permette di consultare un ampio ricettario online, 
                    con la possibilità di cercare ricette in base agli ingredienti presenti in frigo.
                    Il sito offre inoltre la possibilità di registrarsi e salvare le proprie ricette preferite.
                    Inserendo le proprie preferenze alimentari, il sito suggerirà ricette adatte al proprio stile di vita.
                    Se invece si è alla ricerca di nuove ispirazioni, è possibile consultare le nostre selezioni consigliate,
                    o utulizzare i vari filtri per trovare la ricetta perfetta.
                </p>
            </div>

            <div class="colonnaChiSiamo">
                <p class="LS_title">Chi Siamo</p>
                <div class="LS_text2">
                    <p>Il team di sviluppo del sito è composto da:</p>
                    <ul class="listaNomi">
                        <li>Angarella Federico</li>
                        <li>Lavore Alessio</li>
                        <li>Mariani Gianluca</li>
                    </ul>
                </div>
            </div>

            <div class="colonnaInformazioni">
                <p class="LS_title">Informazioni</p>
                <p class="LS_text">
                    Ajojo & Zafferano è un sito web creato come progetto per il corso Linguaggi e Tecnologie per il Web 2023/2024.
                    Tutto il codice sorgente è disponibile su <a href="https://github.com/NotRambi/ajojo_e_zafferano">GitHub</a>
                </p>
            </div>
        </div>

            <!--Modal ad apparizione dei tasti login e signin-->

            <!-- Modal di login -->
            <div id="loginModal" class="modal">
                <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="tipo" value="login">
                    <p class="title">Login </p>
                    <p class="errorLabelLogin" id="erroreLogin"> credenziali errate </p>
                    <label>
                        <input class="input" type="text" id="usernameLogin" name="usernameLogin" placeholder="" required="">
                        <span>Username</span>
                    </label> 
                        
                    <label>
                        <input class="input" type="password" id="passwordLogin" name="passwordLogin" placeholder="" required="">
                        <span>Password</span>
                    </label>
                    <button class="submit" value="Accedi">Accedi</button>
                    <p class="signin">Non hai un account ? <a href="#" onclick="document.getElementById('registerModal').style.display='block';
                                                                                document.getElementById('loginModal').style.display='none';
                                                                                document.getElementById('erroreLogin').style.display = 'none'; document.getElementById('erroreSignin').style.display = 'none';">Registrati</a> </p>
                </form>
            </div>
            
                        
                        

            <!-- Modal di registrazione -->
            <div id="registerModal" class="modal">
                <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="tipo" value="registrazione">
                    <p class="title">Registrazione </p>
                    <p class="errorLabelSignin"  id="erroreSignin"> errore registrazione </p>
                    <p class="message">Registrati ora per avere accesso al servizio completo </p>
                        <div class="flex">
                        <label>
                            <input class="input" type="text" id="nome"  name="nome" placeholder="" required="">
                            <span>Nome</span>
                        </label>
                
                        <label>
                            <input class="input" type="text" id="cognome"  name="cognome" placeholder="" required="">
                            <span>Cognome</span>
                        </label>
                    </div>  
                            
                    <label>
                        <input class="input" type="text" id="username"  name="username" placeholder="" required="">
                        <span>Username</span>
                    </label> 
                        
                    <label>
                        <input class="input" type="password" id="password"  name="password" placeholder="" required="">
                        <span>Password</span>
                    </label>
                    <button class="submit" value="Registrati">Registrati</button>
                    <p class="signin">Hai già un account ? <a href="#" onclick="document.getElementById('loginModal').style.display='block'; document.getElementById('registerModal').style.display='none';document.getElementById('erroreSignin').style.display = 'none';">Login</a> </p>
                </form>
            </div>

            <script>
                // Funzioni php

                function inviaForm(event) {
                    // form nascosta 
                    var form = document.createElement("form");
                    form.setAttribute("method", "post");
                    form.setAttribute("action", "ricettario.php");

                    // input nascosto con il nome della ricetta
                    var input = document.createElement("input");
                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", "ricetta");
                    input.setAttribute("value", event.target.id);

                    // Aggiunta input alla form e submit
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }

                // Aggiungi un evento di click a tutte le immagini
                var CardsRicette = document.getElementsByClassName("card");
                for (var i = 0; i < CardsRicette.length; i++) {
                    // salva in una variabile l'id della card cliccata
                    CardsRicette[i].addEventListener("click", inviaForm);
                }

                // Funzione slider ricette
                var swiper_consigliati = new Swiper('.slide-content1', {
                    slidesPerView: 5,
                    spaceBetween: 20,
                    loop: true,
                    centerSlides: 'true',
                    fade: 'true',
                    breakpoints: {
                        0: {
                            slidesPerView: 2,
                        },
                        835: {
                            slidesPerView: 3,
                        },
                        1100: {
                            slidesPerView: 4,
                        },
                        1416: {
                            slidesPerView: 5,
                        },
                    },
                });

                var swiper_romana = new Swiper('.slide-content2', {
                    slidesPerView: 5,
                    spaceBetween: 20,
                    loop: true,
                    centerSlides: 'true',
                    fade: 'true',
                    breakpoints: {
                        0: {
                            slidesPerView: 2,
                        },
                        835: {
                            slidesPerView: 3,
                        },
                        1100: {
                            slidesPerView: 4,
                        },
                        1416: {
                            slidesPerView: 5,
                        },
                    },
                });

                var swiper_pesce = new Swiper('.slide-content3', {
                    slidesPerView: 5,
                    spaceBetween: 20,
                    loop: true,
                    centerSlides: 'true',
                    fade: 'true',
                    breakpoints: {
                        0: {
                            slidesPerView: 2,
                        },
                        835: {
                            slidesPerView: 3,
                        },
                        1100: {
                            slidesPerView: 4,
                        },
                        1416: {
                            slidesPerView: 5,
                        },
                    },
                });

                // funzione per ridurre il fontsize della nav a in base ai breakpoint
                var nav = document.querySelector('.nav');
                var nav_a = document.querySelectorAll('.nav a');
                var logo_title_p = document.querySelectorAll('.logo_title p');

                function adapt_size(){
                    if(window.outerWidth < 890 && window.outerWidth > 590){
                        var newgap = 0.5 + (window.outerWidth-590)/60*0.2;
                        var newfontnav = 20 + (window.outerWidth-590)/60*2;
                        var newfontlogo = 15 + (window.outerWidth-590)/60;

                        nav.style.gap = newgap+'rem';   //0.5 + (width-590)/60*0.2
                        nav_a.forEach(element => {
                            element.style.fontSize = newfontnav+'px';  //20 + (width-590)/60*2
                        });
                        logo_title_p.forEach(element => {
                            element.style.fontSize = newfontlogo+'px'; //15 + (width-590)/60*1
                        });
                    }
                    else if(window.outerWidth <= 590 && window.outerWidth >= 0){
                        nav.style.gap = '0.5rem';
                        nav_a.forEach(element => {
                            element.style.fontSize = '20px';
                        });
                        logo_title_p.forEach(element => {
                            element.style.fontSize = '15px';
                        });
                    }
                    else{
                        nav.style.gap = '1.5rem';
                        nav_a.forEach(element => {
                            element.style.fontSize = '30px';
                        });
                        logo_title_p.forEach(element => {
                            element.style.fontSize = '20px';
                        });
                    }
                }
                window.addEventListener('resize', function() {
                    adapt_size();
                });
                adapt_size();

                // Funzioni modal Login/Signin
                // Fa apparire il modal del login
                document.getElementById('loginBtn').addEventListener('click', function(event) {
                    document.getElementById('loginModal').style.display = 'block';
                });

                // Chiudi il modal cliccando fuori
                window.onclick = function(event) {
                    if (event.target == document.getElementById('loginModal')) {
                        document.getElementById('loginModal').style.display = "none";
                        document.getElementById('erroreLogin').style.display = "none";
                        document.getElementById('erroreSignin').style.display = "none";
                    }
                    if (event.target == document.getElementById('registerModal')) {
                        document.getElementById('registerModal').style.display = "none";
                        document.getElementById('erroreLogin').style.display = "none";
                        document.getElementById('erroreSignin').style.display = "none";
                    }
                } 

                // Script href carte

                document.getElementById('scroll0').addEventListener('click', function() {
                    document.getElementById('destinazione0').scrollIntoView({ behavior: 'smooth' });
                });

                document.getElementById('scroll1').addEventListener('click', function() {
                    document.getElementById('destinazione1').scrollIntoView({ behavior: 'smooth' });
                });

                document.getElementById('scroll2').addEventListener('click', function() {
                    document.getElementById('destinazione2').scrollIntoView({ behavior: 'smooth' });
                });

                document.getElementById('scroll3').addEventListener('click', function() {
                    document.getElementById('destinazione3').scrollIntoView({ behavior: 'smooth' });
                });

                document.getElementById('scroll4').addEventListener('click', function() {
                    document.getElementById('destinazione4').scrollIntoView({ behavior: 'smooth' });
                });

                document.getElementById('scroll5').addEventListener('click', function() {
                    document.getElementById('destinazione5').scrollIntoView({ behavior: 'smooth' });
                });

                // Script href categorie

                // reset filtri
                function resetFiltri() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'filtri.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('buttonclicked=reset');
                }

                // categorie portata
                function selezionaPortata(portata) {
                    resetFiltri();
                    setTimeout(function() {
                    var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'filtri.php');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.send('buttonclicked=flagPortata&portata=' + encodeURIComponent(portata));
                        setTimeout(function() {
                            window.location.href = 'ricettario.php';
                        }, 10); 
                    }, 10);
                }
                // categorie filtri
                function selezionaFiltro(filtro) {
                    resetFiltri();
                    setTimeout(function() {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'filtri.php');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.send('buttonclicked='+ encodeURIComponent(filtro) +'&'+ filtro +'=' + encodeURIComponent('false'));
                        setTimeout(function() {
                            window.location.href = 'ricettario.php';
                        }, 10);
                    }, 10);
                }


            </script>
    </body>

    <?php
        // IL CODICE PHP GERSTISCE IL LOGIN/REGISTRAZIONE E IL PROFILO
        //DATABASE:
        $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=admin") 
        or die('Could not connect: ' . pg_last_error());    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tipo = $_POST['tipo'];
            //CASO LOGIN
            if($tipo == "login"){
                $username = $_POST['usernameLogin'];
                $password = $_POST['passwordLogin'];
                $query = "SELECT * FROM utenti WHERE username = '$username' AND password = '$password'";
                $result = pg_query($dbconn, $query);
                if ($result) {
                    if (pg_num_rows($result) > 0) {
                        if(!isset($_SESSION['user'])){               
                            $_SESSION['user'] = $username;
                            echo "<script>location.reload();</script>";
                        }
                    } 
                    else {
                        //echo "Nome utente o password non validi.";
                        echo "<script>
                        document.getElementById('loginModal').style.display = 'block';
                        document.getElementById('erroreLogin').style.display = 'block';
                        </script>";
                    }
                }
                else {
                    echo "Errore nella ricerca dell'utente: " . pg_last_error($dbconn);
                }
                pg_free_result($result);
            }
            //CASO REGISTRAZIONE
            if($tipo == "registrazione"){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $nome = $_POST['nome'];
                $cognome = $_POST['cognome'];
                if(!isset($_POST['isvegan'])) $isvegan="false"; else
                    $isvegan = $_POST['isvegan'];
                if(!isset($_POST['intgluten'])) $intgluten = "false"; else
                    $intgluten = $_POST['intgluten'];  
                $query="select * from utenti where username='$username'";
                $result=pg_query($dbconn, $query);
                if(pg_num_rows($result)>0){
                    echo "
                    <script>
                    document.getElementById('registerModal').style.display = 'block';
                    document.getElementById('erroreSignin').style.display = 'block';
                    </script>";
                } else { 
                    if($username==""||$password=="")
                        echo "Registrazione fallita<br>inserisci i dati correttamente";
                    else{
                        $query="insert into utenti values ('$username','$nome','$cognome','$password',$isvegan,$intgluten); ";
                        pg_query($dbconn, $query);
                        echo "registrazione avvenuta con successo";
                    }
                }
            }
        }
        pg_close($dbconn);    
        ?>
</html>