// 攻撃判定のロジック
// ⓪使う数字は基本3つ。
// ・自分のAP
// ・相手のDP
// ・Dice乱数（1〜6の乱数を持たせる。サイコロを模したエフェクト）
// （attack開始時にサイコロを振るエフェクトを入れる。ゆくゆくはサイコロ＊2チャンスも追加？）
// ①まず自分のAPによるAPダメージ基礎値を計算。
//  APダメージ基礎値＝(AP×2)+(AP×Dice/10)
// ②次に相手のDPによるDPダメージ基礎値を計算。
//  DPダメージ基礎値＝(APダメ―ジ基礎値–DP)/2（端数切上。数字がマイナスの場合は0）
// ③最終ダメージポイントを計算。
//  最終ダメージポイント＝APダメ―ジ基礎値 - DPダメージ基礎値
// ④相手のHPを削る。
//  相手のlastestHP＝相手のcurrentHP - 最終ダメージポイント
// ⑤上記攻撃を1ターンごとに繰り返し、先にHPが0になった方が負け。
//攻撃を受ける 

function attack(ap, dp, rand_value) {
  
  attack_base_value = (ap * 2) + (ap * rand_value / 10)

} 