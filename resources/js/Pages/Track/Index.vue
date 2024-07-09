<template>
    <MusicLayout>
        <template #title>
            Listes des tracks
        </template>
        <template #action>
            ajouter une musique
        </template>
        <template #content>
            <div>
                <Track v-for="track in tracks" :key="track.uuid" :track="track" />
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
}
</script>