<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg cursor-pointer">
        <div>
            <img src="storage/tracks/images/test.svg">
        </div>
        <div class="px-6 py-4">
            
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded w-full m" @click="handleClik">
            lire
        </button>
        track {{ track.title }}
    </div>
</template>

<script>
export default{
    name: 'Track',
    props: {
        track: Object,
    },
    methods: {
        handleClik() {
            const url = 'storage/' + this.track.music;

            let audio = new Audio(url);
            audio.play();
        }
    }
}
</script>