<template>
    <DefaultField
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="true"
    >
        <template #field>
            <textarea
                v-bind="extraAttributes"
                :id="field.attribute"
                class="w-full form-control form-input form-input-bordered py-3 h-auto"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
            />

            <p
                v-if="maxLength"
                class="text-right font-semibold text-sm"
                :class="{
                    'text-green-500': value.length <= maxLength,
                    'text-red-500': value.length > maxLength,
                }"
            >
                {{ value.length }} / {{ maxLength }}
            </p>
        </template>
    </DefaultField>
</template>

<script>
import { DependentFormField, HandlesValidationErrors } from "laravel-nova";

export default {
    mixins: [HandlesValidationErrors, DependentFormField],

    props: ["resourceName", "resourceId", "field"],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || "";
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || "");
        },
    },

    computed: {
        maxLength() {
            return this.currentField.maxLength;
        },

        defaultAttributes() {
            return {
                rows: this.currentField.rows,
                class: this.errorClasses,
                placeholder: this.field.name,
            };
        },

        extraAttributes() {
            const attrs = this.currentField.extraAttributes;

            return {
                ...this.defaultAttributes,
                ...attrs,
            };
        },
    },
};
</script>
