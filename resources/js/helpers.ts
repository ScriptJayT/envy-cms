export const $query = (_q: string): HTMLElement | null => {
    try {
        return document.querySelector(_q) as HTMLElement;
    } catch (error) {
        return null;
    }
};

export const $queryAll = (_q: string): HTMLElement[] => {
    try {
        return Array.from(document.querySelectorAll(_q)) as HTMLElement[];
    } catch (error) {
        return [];
    }
}