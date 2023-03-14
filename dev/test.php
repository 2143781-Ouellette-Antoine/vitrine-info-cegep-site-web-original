<style>
* {
    margin: 0;
    padding: 0;
}

#box {
    display: table;
    height: 100%;
    width: 100%;
    margin: 0;
}
.fixed {
    height: 0;
    background-color: rgb(0, 255, 255);
    display: table-row;
}
#remaining {
    background-color: #6a9cff;
    display: table-row;
}
.NavigationBar {
    display: flex;
    flex-direction: row;
    padding: 2.5em;
}
</style>

<html>
<div id="box">

    <div class="fixed">
        <div class="flex">
            <img src="../medias/server.svg">
            <h2>Vitrine de l'informatique</h2>
        </div>
    </div>

    <div id="remaining">



    </div>

    <div class="fixed" style="visibility: hidden">
        <div class="flex">
            <img src="../medias/server.svg">
            <h2>Vitrine de l'informatique</h2>
        </div>
    </div>

</div>

</html>