import { defineConfig, loadEnv } from "vite";
import autoprefixer from "autoprefixer";
import tailwindcss from "@tailwindcss/vite";
import flynt from "./vite-plugin-flynt";
import FullReload from "vite-plugin-full-reload";
import fs from "fs";

const wordpressHost = "http://localhost:10008";
const dest = "./dist";

const entries = [
  "./assets/admin.js",
  "./assets/admin.css",
  "./assets/main.js",
  "./assets/main.css",
  "./assets/print.css",
  "./assets/editor-style.css",
  "./assets/css/tailwind.css",
];

const watchFiles = [
  "*.php",
  "templates/**/*",
  "lib/**/*",
  "inc/**/*",
  "./Components/**/*.{php,twig}",
];

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), "");
  const host = env.VITE_DEV_SERVER_HOST || wordpressHost;
  const isSecure =
    host.indexOf("https://") === 0 &&
    (env.VITE_DEV_SERVER_KEY || env.VITE_DEV_SERVER_CERT);

  return {
    base: "./",
    css: {
      devSourcemap: true,
      postcss: {
        plugins: [autoprefixer()],
      },
    },
    resolve: {
      alias: {
        "@": __dirname,
      },
    },
    plugins: [tailwindcss(), flynt({ dest, host }), FullReload(watchFiles)],
    server: {
      https: isSecure
        ? {
            key: fs.readFileSync(env.VITE_DEV_SERVER_KEY),
            cert: fs.readFileSync(env.VITE_DEV_SERVER_CERT),
          }
        : false,
      host: "localhost",
    },
    build: {
      manifest: true,
      outDir: dest,
      rollupOptions: {
        input: entries,
      },
    },
  };
});
