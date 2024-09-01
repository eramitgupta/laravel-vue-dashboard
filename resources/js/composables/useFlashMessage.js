import { ref, watch } from 'vue';
import { useToast } from 'vue-toastification';

export function useFlashMessage(flash) {
    const toast = useToast();
    const flashRef = ref(flash);

    watch(
        flashRef,
        newFlash => {
            if (newFlash?.message && newFlash.type) {
                toast(newFlash.message, {
                    type: newFlash.type || 'success',
                    timeout: 2000,
                });
                flashRef.value = null; // Clear the flash message after displaying
            }
        },
        { immediate: true }
    );

    return {
        flashRef,
    };
}
