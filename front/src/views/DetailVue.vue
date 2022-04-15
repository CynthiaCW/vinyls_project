<template>
    <div>

       
        <div class="courses-container">
            <h1>Découvrez nos vinyls</h1>
            <div class="course">
                <h3>{{(record.available===true)?'✔':'❌'}}</h3>

                <div class="course-preview">
                    <slot>
                        <h6></h6>
                        <h2></h2>
                        <img class="main-image" :src="record.picture_link" height="200px" href="#" />
                    </slot>
                </div>
                <div class="course-info">
                    <h6>{{record.band}}</h6>
                    <h6>{{record.year_release}}</h6>
                    <h6>{{record.genre}}</h6>
                    <h2>{{record.title}}</h2>

                    <p>{{record.description}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
const API = 'http://dhqm1449.odns.fr/cynthia/back/api/single_read.php/?id='

export default {

    name: 'DetailVue',
    data: () => ({
        record: {}
    }),
    async created() {
        const { recordId } = this.$route.params
        const apiDetailsUri = API + recordId
        const oneRecord = await axios.get(apiDetailsUri)
        this.record = oneRecord.data
    }


}

</script>
