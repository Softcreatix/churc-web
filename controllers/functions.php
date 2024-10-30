<?php
function popup_delete_image(){
    ?>
        <div class="popup hidden-popup popup-image">
            <div class="popup-container">
                <h3>Cher administrateur,</h3>
                <p>Etes-vous sûr de vouloir supprimer cette image de votre galerie ?</p><br>
                <div class="popup-btn">
                    <button class="cancel-popup-image icons-link">Annuler</button>
                    <button class="delete-popup-image icons-link">Supprimer</button>
                </div>
            </div>
        </div>
    <?php
}
function popup_delete_article(){
    ?>
        <div class="popup hidden-popup ">
            <div class="popup-container">
                <h3>Cher administrateur,</h3>
                <p>Etes-vous sûr de vouloir supprimer cette article de votre système ?</p><br>
                <div class="popup-btn">
                    <button class="cancel-popup icons-link">Annuler</button>
                    <button class="delete-popup icons-link">Supprimer</button>
                </div>
            </div>
        </div>
    <?php
}

function popup_delete_sermon(){
    //Popup to delete sermon
    ?>
        <div class="popup hidden-popup ">
            <div class="popup-container">
                <h3>Cher administrateur,</h3>
                <p>Etes-vous sûr de vouloir supprimer cette sermon de votre système ?</p><br>
                <div class="popup-btn">
                    <button class="cancel-popup icons-link">Annuler</button>
                    <button class="delete-popup icons-link">Supprimer</button>
                </div>
            </div>
        </div>
    <?php
}

function popup_delete_ebook(){
    //Popup to delete sermon
    ?>
        <div class="popup hidden-popup ">
            <div class="popup-container">
                <h3>Cher administrateur,</h3>
                <p>Etes-vous sûr de vouloir supprimer cet e-book de votre système ?</p><br>
                <div class="popup-btn">
                    <button class="cancel-popup icons-link">Annuler</button>
                    <button class="delete-popup icons-link">Supprimer</button>
                </div>
            </div>
        </div>
    <?php
}

function popup_delete_video(){
    ?>
        <div class="popup hidden-popup popup-video">
            <div class="popup-container">
                <h3>Cher administrateur,</h3>
                <p>Etes-vous sûr de vouloir supprimer cette vidéo de votre galerie ?</p><br>
                <div class="popup-btn">
                    <button class="cancel-popup-video icons-link">Annuler</button>
                    <button class="delete-popup-video icons-link">Supprimer</button>
                </div>
            </div>
        </div>
    <?php
}

function notconnected(){
    if (! isset($_SESSION['admin'])) {
        // Redirect to the login page if not logged in
        header("Location: ../");
        exit();
    }
}

function logout(){
    if(isset($_POST['logout'])){
        unset($_SESSION['admin']);
        header('location:../');
        exit();
    }
}
?>
