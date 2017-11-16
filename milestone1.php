<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="artfluer.png">
    <title>Reflora Milestone 1</title>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700|Lora:400,400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <style>
        body{
            color: #444444;
            background-color: lightgrey;
            font-family: 'Lora', serif;
        }

        .container{
            padding: 8%;
            margin: 4% 6%;
            background-color: #fdfdfd;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .title{
            margin-top: 2%;
            text-align: center;
            color: #D84C47;
            font-size: 4em;
            font-family: 'Inconsolata', monospace;
        }

        .header{
            font-size: 20pt;
            text-align: left;
            font-family: 'Roboto Slab', monospace;
        }

        p{
            font-size: 13pt;
            line-height: 25pt ;
        }

        a{
            color: #e06453;
            text-decoration: none;
            font-weight: 700;
            line-height: 25pt;
            font-size: 13pt;
        }

        a:visited{
            color: #ce7861;
        }

        a:hover{
            color: #f27b60;
        }

        .flex{
            display: flex;
            align-items: center;
        }

        img{
            width: 100%;
        }

        .introimg{
            width: 30%;
            margin: 2%;
        }

        hr {
            width: 80%;
            opacity: 0.8;
        }

        img{
            width: 70%;
            margin-bottom: 5%;
        }

        .logos{
            width: 30%;
            margin-bottom: 5%;
        }

        @media screen and (max-width: 800px) { iframe { display:none; transition: 2s;}}

    </style>
</head>
<body>
<div class="container">
    <h3 class="title">Reflora: Milestone 1</h3>
    <h3 class="header">Proposal</h3>
        <p>
            <strong>Mission: </strong> A calming space on the internet where people can draw aesthetically pleasing
            compositions, which they can then save and share. <br> <br>
            <strong>Audience: </strong> Chilled out Yogis (Primary), stressed college students,
            burnt out business suits, instagram influencers, them youngins, and Max Nikias. <br> <br>
            <strong>Features: </strong> <br>
            1) Introduction page that explains the function of the site. <br>
            2) Settings menu wherein the user can adjust the settings of the interactive graphic
            (for example, color, width of the circles, and speed of drawing). <br>
            3) A camera button to take and save screenshots, once the user clicks the button they will be prompted to login
            or sign up so that we can save their data. <br>
            4) Library that people save screenshots and drawing settings. <br>
            5) Profile to allow users to browse through other user's drawings and save drawings and drawing settings that
            they appreciate. <br><br>
            <strong>Data to Import: </strong> Emojis, Bitmojis, Maps (to draw on as a background), Photos (which the site
            will pick a color palette from)<br><br>
            <strong>Team Roles: </strong><br>
            Mimi -  p5.js and CSS developer, graphics<br>
            Arthur - HTML and PHP Developer<br>
            Hal - Database Administrator, SQL, Project Manager<br><br>
            <strong>Site Map: </strong><br>
            <img src="reflora_site_map_1.png">

        </p>
        <h3 class="header">Database</h3>
    <p>
        <strong>Overviews: </strong><br>
        <img src="reflora_database_1.png">
        <br><br>
        <strong>C-Panel Databases: </strong><br>
        <img src="reflora_users_table_1.png">
        <img src="reflora_entries_table_1.png">
        <img src="reflora_images_table_1.png"><br>
        <strong>C-Panel View: </strong><br>
        <img src="reflora_view_table_1.png">
    </p>

    <h3 class="header"> Logos </h3>
    <img class="logos" src="reflora_logos_1.png">
    <img class="logos" src="reflora_logos_2.png">
    <img class="logos" src="reflora_logos_3.png">
    <img class="logos" src="reflora_logo_4.png">
    <img class="logos" src="reflora_logo_5.png">
    <img class="logos" src="reflora_logo_6.png">
    <img class="logos" src="reflora_logo_7.png">
    <img class="logos" src="reflora_logo_8.png">
    <img class="logos" src="reflora_logo_9.png">



    <h3 class="header"> Frontpages </h3>
    <img src="reflora_frontpage_1.png">
    <img src="reflora_frontpage_2.png">
    <img src="reflora_frontpage_3.png">

    <h3 class="header"> Walkthrough </h3>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/6xP82pkm_kA" frameborder="0" gesture="media" allowfullscreen></iframe>


</div> <!-- close container -->

</body>
</html>
