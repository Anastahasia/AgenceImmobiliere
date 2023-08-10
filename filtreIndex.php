<div id="backgroundImg">
    <img src="https://media.istockphoto.com/id/1125919172/photo/asphalt-road-and-sky-clouds-background.jpg?s=612x612&w=0&k=20&c=y4Gyqe83YQASnrysdcFyjBv6-LqyjQ6ipOupP1FD39s=" alt="">
</div>
<div class="filtre">
    <div class="navbar navbar-expand-custom navbar-mainbg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"></div>
                <li class="nav-item active" id="location">
                    <a class="nav-link" id="location" href="javascript:void(0);">Louer</a>
                </li>
                <li class="nav-item" id="vente">
                    <a class="nav-link" href="javascript:void(0);">Acheter</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="corpsFiltre">
        <form id="villeLocation" action="resultats.php" method="get">
            <label for="inputLocation"> Où souhaitez-vous louer ? </label>
            <div class="inputFiltre">
                <input type="text" id="inputLocation" name="inputLocation">
                <button type="submit" name="contrat" value="location"> <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>Rechercher</button>
            </div>
        </form>
        
        <form id="villeVente" action="resultats.php" method="get">
            <label for="inputVente"> Où souhaitez-vous acheter ? </label>
            <div class="inputFiltre">
                <input type="text" id="inputVente" name="inputVente">
                <button type="submit" name="contrat" value="vente"> <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>Rechercher</button>
            </div>
        </form>
    </div>
</div>
<script>
    let togg1 = document.getElementById("location");
let togg2 = document.getElementById("vente");
let d1 = document.getElementById("villeLocation");
let d2 = document.getElementById("villeVente");

togg1.addEventListener("onclick", () => {
  if(getComputedStyle(d1).display != "none"){
    d1.style.display = "none";
  } else {
    d1.style.display = "block";
  }
})

function togg(){
  if(getComputedStyle(d2).display = "none"){
    d2.style.display = "block";
  }
  
};
togg2.onclick = togg;
</script>
<!-- sous la barre de filtre 
        - Explorez notre sélection d'immobilier d'exception dès aujourd'hui !-->