<template>
    <form action="/admin/objects/create" @submit="checkForm" method="post">
        <input type="hidden" name="_token" :value="csrf">

        <p v-if="errors.length">
            <b>Пожалуйста исправьте указанные ошибки:</b>
            <span class="error-message" v-for="error in errors">• {{ error }}</span>
        </p>

        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" v-model="name">
        </div>

        <div class="form-group">
            <label>Координаты</label>

            <l-map style="height: 350px" :zoom="zoom" :center="center" @click="addMarker">
                <l-tile-layer :url="url"></l-tile-layer>
                <l-marker v-for="marker in markers" :lat-lng="marker.latlng" >
                    <l-popup><b>{{ marker.name }}</b> <br> {{ marker.desc }}</l-popup>
                </l-marker>
            </l-map>

            <input type="hidden" name="coords" v-model="coords">
        </div>

        <div class="form-group">
            <label for="desc">Описание</label>
            <textarea name="desc" id="desc" rows="3" class="form-control" v-model="desc"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control" v-model="status">
                <option value="all">Для всех</option>
                <option value="auth">Для авторизованных пользователей</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</template>

<script>
    import { LMap, LTileLayer, LMarker, LPopup } from 'vue2-leaflet';

    export default {
        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup
        },
        data () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                // map data
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                zoom: 11,
                center: [50.45466, 30.5238],
                markers: [],

                // form fields
                errors: [],
                name: null,
                coords: null,
                desc: null,
                status: 'all'
            };
        },
        props: ['server_errors'],
        mounted() {
          if (this.server_errors)
              this.errors = this.server_errors;
        },
        methods: {
            addMarker(event) {
                this.markers = []; // очищаем массив маркеров т.к. добавить можем только 1 координаты

                this.markers.push({ // наносим на карту маркер
                    'name': this.name,
                    'latlng': event.latlng,
                    'desc': this.desc
                });

                this.coords = event.latlng['lat'] + "," + event.latlng['lng'];
            },

            checkForm(e) {
                this.errors = [];

                if (!this.name)
                    this.errors.push("Укажите название объекта");
                else if (this.name.length > 255)
                    this.errors.push("Максимально допустимая длина названия - 255 символов");

                if (!this.coords)
                    this.errors.push("Поставьте маркер на карту");

                if (!this.desc)
                    this.errors.push("Укажите описание объекта");
                else if (this.desc.length > 255)
                    this.errors.push("Максимально допустимая длина описания - 255 символов");

                if (this.errors.length === 0)
                    return true;

                e.preventDefault();
            }
        }
    }
</script>
