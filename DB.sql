-- ユーザテーブルにデータを追加
INSERT INTO users (name, email, password, role) VALUES
('admin', 'admin@example.com', '$2y$10$Uk.dfn5c8fjAe77C/QgWM.bOQnzy8sSc7z2MJ9//RfHxA69f6ISL6', 'admin'),
('user1', 'user@example.com', '$2y$10$kk.IcEdUuD.XQ9pD8XHvb.UBBnU2wXKBXKyTdkAqhaEAJGfq/JnNa', 'member');

-- レシピテーブルにデータを追加
INSERT INTO recipes (title, category, ingredients, instructions, user_id) VALUES
('ざるそば', 'そば', 'そば (乾麺)100g、お湯 (ゆでる用)適量、つけ汁、水50ml、めんつゆ (2倍濃縮)50ml、小ねぎ (小口切り)適量、わさび小さじ1/4、のり (刻み)適量', '鍋にお湯を沸かしそばを入れパッケージの表記通りにゆで、湯切りします。流水で冷やし、水気を切ります。ボウルにつけ汁の材料を入れ、混ぜ合わせます。器にそばを盛り付け、３、小ねぎ、わさびを添え、のりをのせて完成です。', 1),
('かけそば', 'そば', 'そば (冷凍)1玉、ほうれん草30g、お湯 (ゆでる用)500ml、塩 (ゆでる用)小さじ1/2、水300ml、めんつゆ (2倍濃縮)100ml、かまぼこ2切れ、', '鍋にお湯を沸かして塩とほうれん草を入れ、1分程ゆで、お湯を切ります。流水にさらし、水気を絞り、根元を切り落として3cm幅に切ります。耐熱ボウルにそばを入れ、ふんわりとラップをかけ、パッケージの表記通りに電子レンジで加熱し解凍します。
鍋につゆの材料を入れ混ぜ、中火にかけてひと煮立ちしたら、火から下ろします。器に水気を切った2を入れ、3をかけ、1、かまぼこをのせて完成です。', 2);


-- コメントテーブルにデータを追加
INSERT INTO comments (text, user_id, recipe_id) VALUES
('ざるそばサイコーーー！！！', 1, 1),
('ざるそばサイコーーー！！！', 1, 2),
('かけもいいね', 2, 1),
('温かくておいしい', 2, 2);