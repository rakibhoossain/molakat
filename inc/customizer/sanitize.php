<?php
/**
 * Validate the options against the breaking news types
 *
 * @param  string[] $input
 *
 * @return string
 */
// function butterfly_sanitize_array_top_type( $input ) {
//   $valid = butterfly_top_post_type();
//     if ( ! array_key_exists( $input, $valid ) ) {
//       return;
//     }
//   return $input;
// }

/**
 * Validate the options against the existing pages
 *
 * @param  string[] $input
 *
 * @return string
 */
// function butterfly_sanitize_array_page( $input ) {
//   $valid = butterfly_page_list();
//   if (is_array($input) && !empty($input)) {
//     foreach ( $input as $value ) {
//       if ( ! array_key_exists( $value, $valid ) ) {
//         return [];
//       }
//     }
//   }
//   return $input;
// }

/**
 * Validate the options against the existing pages
 *
 * @param  string[] $input
 *
 * @return string
 */
function butterfly_sanitize_array_post( $input ) {
  $valid = butterfly_post_list();
  if (is_array($input) && !empty($input)) {
    foreach ( $input as $value ) {
      if ( ! array_key_exists( $value, $valid ) ) {
        return [];
      }
    }
  }
  return $input;
}

/**
 * Validate the options against the existing categories
 *
 * @param  string[] $input
 *
 * @return string
 */
function butterfly_sanitize_array_catagory( $input ) {
  $valid = butterfly_cat_list();
  if (is_array($input) && !empty($input)) {
    foreach ( $input as $value ) {
      if ( ! array_key_exists( $value, $valid ) ) {
        return [];
      }
    }
  }
  return $input;
}