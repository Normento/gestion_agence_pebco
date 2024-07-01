<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>P.E.B.Co BETHESDA</title>

<!-- Favicons -->
<link href="{{ asset('img/pebco.jpeg')}}" rel="icon" style="height:50px; width:50px;">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li> <img src="{{ asset('img/pebco.jpeg')}}" class="img-circle" width="80"></a></p>
                </li>
                <!-- <li><a href="#">Plans</a></li>
                <li><a href="#">Let's talk!</a></li> -->

            </ul>
        </nav>
    </header>
    <main>
        <div class="main-container">
            <h4 class="sub--main-title">Site Web</h4>
            <h1 class="main-title">PEBCo Bethesda</h1>
            <p class="description"><u>Votre compte a été momentanement bloqué veuillez contacter le service informatique.</u></p>
            <p>Merci.</p>
            <button type="button" class="main-button"><a href="mailto:malomonalexandre@gmail.com">Contacter</a></button>
        </div>
    </main>
</body>

</html>


<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Playfair Display", serif;
        color: white;
    }

    body {
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        position: relative;
        background-color: #330033;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23404' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23505'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E");
    }

    nav {
        width: 100vw;
        margin-top: 0.7rem;
    }

    ul {
        display: flex;
        list-style: none;
        align-items: center;
        justify-content: flex-end;
    }

    li {
        display: inline-block;
        margin-right: 2rem;
    }

    a {
        text-decoration: none;
    }

    .main-container {
        position: absolute;
        /* position the div */
        top: 50%;
        /* move the div down by half of its height */
        left: 50%;
        /* move the div right by half of its width */
        transform: translate(-50%,
                -50%);
        /* offset the previous translations by half the div's width and height */
        width: 60%;
        /* set the width of the div */
        height: 350px;
        /* set the height of the div */
        padding: 0.4rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
    }

    .sub--main-title {
        font-family: "Lora", serif;
        font-weight: 400;
        font-size: 1.1rem;
        text-transform: uppercase;
        text-align: center;
    }

    .main-title {
        font-weight: 900;
        font-size: 3rem;
        text-align: center;
        line-height: 4rem;
    }

    .description {
        text-align: center;
        line-height: 1.5rem;
    }

    .main-button {
        width: 100px;
        height: 35px;
        background-color: rgba(255, 255, 255, 0.268);
        color: white;
        font-weight: 600;
        border-radius: 0.4rem;
        border: none;
        border: white 2px solid;
    }

    .main-button:hover {
        cursor: pointer;
        background-color: white;
        color: #330033;
        transition: 0.3s ease-in-out;
    }

    .main-button:active {
        border-radius: 0.6rem;
    }

    /* Responsivness */

    @media only screen and (max-width: 552px) {
        .main-container {
            width: 80%;
        }
    }

    @media only screen and (max-width: 552px) {
        .main-container {
            width: 100%;
        }
    }

    @media only screen and (max-width: 320px) {
        html {
            font-size: 15px;
        }

        .main-container {
            width: 100%;
        }
    }
</style>
