<div id="backgroundImg">
    <img src="https://media.istockphoto.com/id/1125919172/photo/asphalt-road-and-sky-clouds-background.jpg?s=612x612&w=0&k=20&c=y4Gyqe83YQASnrysdcFyjBv6-LqyjQ6ipOupP1FD39s=" alt="">
</div>
<div class="filtre">
    <div class="navbar navbar-expand-custom navbar-mainbg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"></div>
                <li class="nav-item active">
                    <a class="nav-link"  id="location" href="javascript:void(0);">Louer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vente" href="javascript:void(0);">Acheter</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="corpsFiltre">
        <form id="villeLocation" action="resultats.php" method="get">
            <label for="input" id="labelFiltre"> 
                <span id="labelLocation">
                    Où souhaitez-vous louer ? 
                </span>
                <span id="labelVente">
                    Où souhaitez-vous acheter ?
                </span>
            </label>
            <div class="inputFiltre">
                <input type="text" id="input" name="inputLocation" >
                <button type="submit" id="boutonVille" name="contrat" value="location"> <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>Rechercher</button>
            </div>
        </form>
    </div>
</div>
