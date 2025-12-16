# Statamic Original Filename

**Remember the original, unsanitized filename of assets uploaded in Statamic.**

This addon stores the original filename of uploaded assets in their metadata, allowing later
access even after Statamic has sanitized and modified the filename for compatibility. Useful for
scenarios where the original filename is needed, such as displaying it to users or allowing
downloads with the original name.

- Filename as uploaded: `Long-Tailed Duck © Ray Hennessy.jpg`
- Filename as sanitized: `long-tailed-duck-ray-hennessy.jpg`
- Original filename: `Long-Tailed Duck © Ray Hennessy`

## Installation

```bash
composer require daun/statamic-original-filename
```

## Usage

Once installed, the addon will store the original filename of each uploaded asset in its
metadata under the key `original_filename`.

### Frontend

```antlers
{{ asset }}
  <a href="{{ url }}" download="{{ original_filename }}.{{ extension }}">
    Download {{ original_filename }}
  </a>
{{ /asset }}
```

### Backend

If you want your editors to see (and possibly edit) the original filename in the control panel,
add a text field to your asset blueprint, using `original_filename` as the handle.

```diff
title: Asset
fields:
  -
    handle: alt
    field:
      type: text
      display: Alt Text
+  -
+    handle: original_filename
+    field:
+      type: text
+      display: Original Filename
```

## License

[MIT](https://opensource.org/licenses/MIT)
