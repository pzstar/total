<?php
if (!class_exists('Total_Import_Config')):

    class Total_Import_Config {

        public function __construct() {
            add_action('hdi_import_additional_files', array($this, 'import_additional_files'));
        }

        public function import_additional_files() {
            $impfiles = array(
                array(
                    'name' => 'Import File 1',
                    'file_name' => 'importfile1.json',
                ),
                array(
                    'name' => 'Import File 2',
                    'file_name' => 'importfile2.json',
                )
            );

            foreach ($impfiles as $file) {
                $postTitle = $file['name'];

                $data = array(
                    'post_title' => sanitize_text_field($postTitle),
                    'post_status' => 'publish'
                );

                /* Add new Form */
                $formId = WPPayForm\App\Models\Form::store($data);
                // Alternate
                // $data['post_type'] = 'wp_payform';
                // $data['post_status'] = 'publish';
                // $formId = wp_insert_post($data);

                wp_update_post([
                    'ID' => $formId,
                    'post_title' => sanitize_text_field($data['post_title']) . ' (#' . $formId . ')'
                ]);

                $import_file = get_template_directory() . '/inc/import/files/' . $file['file_name'];
                $options = array('associative' => true);

                $data = wp_json_file_decode($import_file, $options);

                $metas = isset($data['form_meta']) ? $data['form_meta'] : [];
                if (!is_array($metas)) {
                    return;
                }
                foreach ($metas as $metaKey => $metaValue) {
                    update_post_meta($formId, $metaKey, $metaValue);
                }

            }

        }

    }

    new Total_Import_Config;

endif;
