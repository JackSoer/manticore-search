<template>
    <main class="main">
        <div>
            <input
                type="text"
                class="input"
                @input="handleSearch"
                v-model="search"
            />
            <div class="results" v-if="search.length">
                <div class="result" v-for="result in results">
                    {{ result.name }}
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";

const search = ref("");
const results = ref([]);

const handleSearch = () => {
    const axiosFetch = async () => {
        if (!search.value.length) {
            results.value = [];

            return;
        }

        try {
            const response = await axios.get(
                `/countries/autocomplete?query=${search.value.trim()}`,
                {
                    headers: {
                        Accept: "application/json",
                    },
                }
            );

            results.value = response.data;
        } catch (err) {
            console.log(err);
        }
    };

    axiosFetch();
};
</script>

<style lang="scss" scoped>
* {
    box-sizing: border-box;
}
.main {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.input {
    padding: 5px 10px;
    font-size: 18px;
    border: 1px solid gray;
}

.results {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 100%;
}

.result {
    width: 100%;
    padding: 5px 15px;
    border: 1px solid gray;
    transition: all 0.3s ease;

    &:hover {
        background-color: lightgray;
    }
}
</style>
