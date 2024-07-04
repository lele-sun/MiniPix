<?php
if (!file_exists('static/install.lock')) {
    header('Location: install.php');
    exit;
}
?>
<html lang="zh-CN"><head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MiniPix 简易图床</title>
	<link rel="shortcut icon" href="static/favicon.ico">
	<link rel="stylesheet" type="text/css" href="static/css/styles.css">
</head>
	<body>
		<div class="uploadForm">
		 <div id="deleteButtonWrapper" style="position: absolute;"></div>
         <button id="deleteImageButton">×</button>
		<form id="uploadForm" action="api.php" method="POST" enctype="multipart/form-data">
			<div id="imageUploadBox" onclick="document.getElementById('imageInput').click();">
				<input type="file" id="imageInput" name="image" accept="image/*" required style="display: none;" onchange="updateImagePreview(event);">
				<img id="imagePreview" src="static/svg/up.svg" alt="预览图片">
			</div>
			<div id="pasteOrUrlInputBox">
				<input type="text" id="pasteOrUrlInput" placeholder="此处可粘贴图像URL或使用Ctrl+V粘贴图片">
			</div>
			<div id="parameters">
				<label for="qualityInput">图片清晰度（60-100）：<output id="qualityOutput">60</output>
				</label>
				<input type="range" id="qualityInput" name="quality" min="60" max="100" value="60" step="5">
			</div>
			<div id="progressContainer">
				<div id="progressBar"></div>
			</div>
		</form>
		</div>
		<div id="urlOutput">
			<input type="text" class="copy-indicator" id="imageUrl" readonly placeholder="图片链接">
			<input type="text" class="copy-indicator" id="markdownUrl" readonly placeholder="Markdown代码">
			<input type="text" class="copy-indicator" id="markdownLinkUrl" readonly placeholder="Markdown链接代码">
			<input type="text" class="copy-indicator" id="htmlUrl" readonly placeholder="HTML代码">
		</div>
		<div id="imageInfo" class="double-column-layout">
			<div>
				<h2>压缩前</h2>
				<div style="text-align:center;">
					<p>宽度：<span id="originalWidth"></span> px</p>
					<p>高度：<span id="originalHeight"></span> px</p>
					<p>大小：<span id="originalSize"></span> KB</p>
				</div>
			</div>
			<div>
				<h2>压缩后</h2>
				<div style="text-align:center;">
					<p>宽度：<span id="compressedWidth"></span> px</p>
					<p>高度：<span id="compressedHeight"></span> px</p>
					<p>大小：<span id="compressedSize"></span> KB</p>
				</div>
			</div>
		</div>
<script type="text/javascript" src="static/js/script.js"></script>
<script type="text/javascript" src="static/js/cursor.js"></script>
</body>
</html>