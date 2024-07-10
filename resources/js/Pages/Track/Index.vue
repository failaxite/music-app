<template>
    <MusicLayout>
        <template #title>
            Listes des tracks
        </template>
        <template #action>
            <Link :href="route('tracks.create')">
                Créer une musique
            </Link>
        </template>
        <template #content>
            <div>   
                <input v-model="fliter" type="search" class="shadow">

                <div class="grid grid-cols-4 gap-4">
                    <Track v-for="track in fliterTracks" :key="track.uuid" :track="track" @played="play"/>
                </div>
            </div>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'; 
import Track from '@/Components/Track/Track.vue';


export default{
    name: 'Index',
    components: {
        MusicLayout,
        Track,
    },
    props: {
        tracks: Array,
    },
    data() {
        return{
            audio: null,
            currentTrack: null,
            fliter: '',
        }
    },
    computed: {
        fliterTracks() {
            return this.tracks.filter(track => track.title.toLowerCase().includes(this.fliter.toLowerCase())
                ||track.artist.toLowerCase().includes(this.fliter.toLowerCase())
            );
        }
    },
    methods: {
        play(track) {
            const url = 'storage/' + track.music;

            if(!this.currentTrack) {
                this.audio = new Audio(url);
                this.audio.play();
            } else if (this.currentTrack !== track.uuid) {
                this.audio.pause();
                this.audio.src = url;
                this.audio.play();
            } else {
                this.audio.paused ? this.audio.play() : this.audio.pause();
            }

            this.currentTrack = track.uuid;
            this.audio.addEventListener('ended', () => this.currentTrack = null);
        }
    }
}
</script>