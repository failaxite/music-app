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

                <div>
                    <label for="image">Image</label>
                    <input @input="form.image = $event.target.files[0]" type="file" name="image" id="image">
                    <p>{{ form.errors.image }}</p>
                </div>

                <div>
                    <label for="audio">Audio</label>
                    <input @input="form.music = $event.target.files[0]" type="file" name="audio" id="image">
                    <p>{{ form.errors.music }}</p>
                </div>

                <input type="submit" value="Crée la musique" :disabled="form.processing">

            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'; 

export default{
    name: 'Create',
    components: {
        MusicLayout,
    },
    data() {
        return {
            form: this.$inertia.form ({
                title: '',
                artist: '',
                image: null,
                music: null,
                display: true,
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('tracks.store'));
        }
    }
}
</script>