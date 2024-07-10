<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg cursor-pointer" :class="{border}">
        <div>
            <img :src=" 'storage/' + track.image">
        </div>
        <div class="px-6 py-4">
            <div>{{ track.title }}</div>
            <small>{{ track.artist }}</small>
        </div>
        <div class="w-full flex justify-content-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded w-full m" @click="handleClik">
            lire
            </button>
            <Link :href="route('tracks.edit', {track: track})">
                Modifier
            </Link>
            <Link :href="route('tracks.destroy', {track: track})" as="button" method="delete">
                Supprimer
            </Link>
        </div>
    </div>
</template>

<script>
export default{
    name: 'Track',
    emits: ['played'],
    props: {
        active: {
            type: Boolean,
            default: false,
        },
        track: Object,
    },
    methods: {
        handleClik() {
            this.$emit('played', this.track);
        }
    }
}
</script>