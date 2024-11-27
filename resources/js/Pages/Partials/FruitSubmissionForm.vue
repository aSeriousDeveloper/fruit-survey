<script setup lang="ts">
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps<{
    fruit: Array<object>;
}>();

const form = useForm({
    fruit: [],
    last_eaten: null,
})

const submit = () => {
    form.post(route('fruit'), {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <section class="p-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Fruit Submission
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Pick your favourite fruit, and tell us when you last ate fruit.
            </p>
        </header>

        <form @submit.prevent="submit" class="mt-6 space-y-6">
            <div>
                <InputLabel for="fruit">What is your favourite fruit?</InputLabel>
                <select name="fruit" id="fruit" multiple v-model="form.fruit">
                    <template v-for="fruit_item in fruit">
                        <option :value="fruit_item" >{{fruit_item}}</option>
                    </template>
                </select>
                <InputError class="mt-2" :message="form.errors.fruit" />
            </div>

            <div>
                <InputLabel for="last_eaten">Last Time you Ate Fruit</InputLabel>
                <TextInput type="date" name="last_eaten" id="last_eaten" v-model="form.last_eaten" />
                <InputError class="mt-2" :message="form.errors.last_eaten" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Submit</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >
                        Submitted.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>

<style scoped>

</style>
