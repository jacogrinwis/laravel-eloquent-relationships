import defaultTheme from "tailwindcss/defaultTheme";
import plugin from "tailwindcss/plugin";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist: [
        ...[
            "slate",
            "gray",
            "zinc",
            "neutral",
            "stone",
            "red",
            "orange",
            "amber",
            "yellow",
            "lime",
            "green",
            "emerald",
            "teal",
            "cyan",
            "sky",
            "blue",
            "indigo",
            "violet",
            "purple",
            "fuchsia",
            "pink",
            "rose",
        ].flatMap((color) => [`bg-${color}-500`, `text-${color}-500`]),
        ...["white", "black"].flatMap((color) => [
            `bg-${color}`,
            `text-${color}`,
        ]),
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require("flowbite/plugin"),
        plugin(function ({ addVariant, addUtilities }) {
            addVariant("popover-open", "&:popover-open");
            addVariant("starting", "@starting-style");
            addVariant("dialog-open", "&[open]");
            addVariant("dialog-not-open", "&:not([open])");
            addVariant("scrollbar", "&::-webkit-scrollbar");
            addVariant("scrollbar-thumb", "&::-webkit-scrollbar-thumb");
            addVariant("scrollbar-track", "&::-webkit-scrollbar-track");
            addUtilities({
                ".transition-discrete": {
                    transitionBehavior: "allow-discrete",
                },
                ".scrollbar-thumb-radius-4": {
                    "&::-webkit-scrollbar-thumb": {
                        "border-radius": "4px",
                        "background-color": "#ccc",
                    },
                },
                ".scrollbar-thumb-radius-8": {
                    "&::-webkit-scrollbar-thumb": {
                        "border-radius": "8px",
                        "background-color": "#ccc",
                    },
                },
                ".scrollbar-width-2": {
                    "&::-webkit-scrollbar": {
                        width: "2px",
                        height: "2px",
                    },
                },
                ".scrollbar-width-4": {
                    "&::-webkit-scrollbar": {
                        width: "4px",
                        height: "4px",
                    },
                },
                ".scrollbar-width-6": {
                    "&::-webkit-scrollbar": {
                        width: "6px",
                        height: "6px",
                    },
                },
                ".gap-scroll": {
                    gap: "1rem",
                    "&:has(> section::-webkit-scrollbar)": {
                        gap: "10.5rem",
                    },
                },
            });
        }),
    ],
};
