<template>
    <MusicLayout>
        <template #content>
            <form @submit.prevent="submit">
                <div>
                    <label for="title">Titre</label>
                    <input id="title" v-model="form.title" type="text"></input>
                    <p>{{ form.errors.title }}</p>
                </div>

                <div>
                    <label for="artist">Artist</label>
                    <input id="artist" v-model="form.artist" type="text"></input>
                    <p>{{ form.errors.artist }}</p>
                </div>

                <div>
                    <label for="display">Display</label>
                    <select name="display" id="display" v-model="form.display">
                        <option :value="true">oui</option>
                        <option :value="false">non</option>
                    </select>
                    <p>{{ form.errors.display }}</p>
                </div>



                <input type="submit" value="Modifier la musique" :disabled="form.processing">

            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'; 


export default{
    name: 'Edit',
    components: {
        MusicLayout,
    },
    props: {
        track: Object,
    },
    data() {
        return {
            form: this.$inertia.form ({
                title: this.track.title,
                artist: this.track.artist,
                display: this.track.display ? true : false,
            }),
        }
    },
    methods: {
        submit() {
            this.form.put(route('tracks.update', {track: this.track}));
        }
    }
}
</script>