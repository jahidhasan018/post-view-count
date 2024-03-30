# Post View Count

The **Post View Count** WordPress plugin efficiently tracks and displays post views, providing valuable insights into your content's popularity.


**Installation:**

1. **Upload the Plugin Files:** Upload the entire `post-view-count` directory to your WordPress plugins directory (`/wp-content/plugins/`).
2. **Activate the Plugin:** Navigate to the "Plugins" menu within your WordPress dashboard, locate "Post View Count," and click "Activate."

**Usage:**

- **Shortcode:** Use the `[post_view_count id="" title="" subtitle=""]` shortcode to display post view counts within your content. Here's how you can customize it:
  - `id`: (Optional) Specify a specific post ID to display views for a different post. Leave it blank to show the current post's views.
  - `title`: (Optional) Customize the text before the view count.
  - `subtitle`: (Optional) Set custom text displayed after the view count.
- **Gutenberg Block:** Search for "Post View Count" within the Gutenberg block editor and add it to your post/page as needed.

**Key Functionalities:**

- **Intuitive Admin Panel:** A dedicated settings page ("Post View Count") allows you to configure display options and customize text labels for a seamless user experience.
- **Versatile Shortcode:** The `[post_view_count id="" title="" subtitle=""]` shortcode empowers you to effortlessly insert post view counts anywhere within your content, enhancing visual appeal and user engagement.
- **Gutenberg Block Integration:** Leverage the intuitive Gutenberg block editor to seamlessly integrate post view counts into your posts and pages.
- **Enhanced Post Table:** Streamline your workflow with a visually informative "Views" column readily displayed in the WordPress post table, providing a quick overview of each post's performance.

## File Structure and Breakdown

- **assets:** Contains assets for both the admin and public-facing parts of the plugin.
  - *admin:* Assets for the plugin's admin interface.
  - *public:* Assets for the public-facing parts of the plugin.
- **blocks/build:** Houses assets related to Gutenberg blocks.
- **includes:** Essential files and classes for the plugin's functionality.
  - **classes:** Contains class files necessary for the plugin.
    - *pvc-functions.php:* Houses utility functions for the plugin.
- **languages:** Directory for storing language files to support multi-language functionality.
- **lib:** Contains libraries required for the proper functioning of the plugin.
- **post-view-count.php:** The main plugin file.
- **uninstall.php:** The file handle when the plugin is uninstalled or deleted.

## Contributing

We welcome contributions to enhance the functionality and usability of the **Post View Count** plugin. If you encounter any issues or have suggestions for improvements, please feel free to submit a pull request or open an issue on GitHub.

## License

This plugin is licensed under the [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.en.html). You are free to modify and distribute the plugin as per the terms of this license.

## Support

For any inquiries or assistance regarding the plugin, please reach out to us via [GitHub Issues](https://github.com/your/repository/issues).

## Acknowledgements

We would like to extend our gratitude to all contributors who have helped improve and maintain the **Post View Count** plugin.

---

Feel free to adjust the README.md file as needed, adding or removing information according to your preferences.
