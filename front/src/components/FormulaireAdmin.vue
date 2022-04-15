<template>
    <div>
        <form v-on:submit.prevent="submitForm">
            <h1>Ajouter un vinyls</h1>
            <div class="champs">
                <label for="pic">Lien URL image</label>
                <input type="text" name="picture_link" id="pic" required v-model="form.picture_link" />
            </div>

            <div class="champs">
                <label for="title">Nom du vinyl</label>
                <input type="text" id="title" name="title" required v-model="form.title" />
            </div>
            <div class="champs">
                <label for="band">Nom du groupe</label>
                <input type="text" id="band" name="band" required v-model="form.band" />
            </div>
            <div class="champs">
                <label for="year">Année</label>
                <input
                    type="text"
                    id="year"
                    name="release_year"
                    placeholder="2022/07/22"
                    required
                    v-model="form.release_year"
                />
            </div>

            <div class="champs">
                <label for="genre">Genre</label>
                <input type="text" id="genre" name="genre" required v-model="form.genre" />
            </div>

            <div class="champs">
                <label for="description">Description</label>
                <textarea
                    name="description"
                    id="descriprion"
                    cols="30"
                    rows="10"
                    v-model="form.description"
                />
            </div>

            <div class="champs">
                <label for="checkbox">En stock</label>
                <input
                    type="checkbox"
                    name="available"
                    checked="false"
                    value="1"
                    v-model="form.available"
                />
            </div>

            <div class="btnCentrer">
                <button class="btn">Creer un vinyl</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'
const API_CREATE = 'http://localhost:8000/create.php'

export default {
    name: 'FormulaireAdmin',
    data: () => ({

        form: {
            picture_link: '',
            title: '',
            band: '',
            release_year: '',
            genre: '',
            description: '',
            available: ''
        }
    }
    ),
    methods: {
        async submitForm() {
            if (await axios.post(API_CREATE, this.form)) {
                this.$router.push({ name: 'admin' })
                console.log(this.form)
            } else {
                console.log('fuck')
            }

        }
    }
}


</script>

<style scoped>
/* Fonts Titre */
@import url("https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

/* Fonts texte */
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

form {
    background-color: #fff;
    font-family: "Poppins";
    border-radius: 10px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;

    max-width: 100%;
    margin: 20px;
    overflow: hidden;
    width: 563px;
}

form > .champs {
    display: flex;
    flex-direction: column;
    align-content: center;
    padding: 15px;
}
label {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    color: #7b6ded;
}
input {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    border: 1.5px solid;
    border-radius: 6px;
    width: 50%;
    height: 50%;
    border-color: #838383;
}

.btnCentrer {
    display: flex;
    justify-content: center;
    padding: 15px;
}
.btn {
    background-color: #7b6ded;
    border: 0;
    border-radius: 10px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    color: #fff;
    font-size: 16px;
    padding: 12px 25px;
    bottom: 30px;
    right: 30px;
    letter-spacing: 1px;
}

.btn:hover {
    background-color: #533ef0;
}

h1 {
    font-family: "Poppins";
    padding: 15px;
}
</style>