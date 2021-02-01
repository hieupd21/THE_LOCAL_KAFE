<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'prod_name'=>'Euro Espresso',
            'prod_price'=>13.00,
            'prod_quantity'=>10,
            'prod_description'=>'Pha cà phê espresso theo phong cách châu Âu truyền thống với vị đắng nổi bật, vị mặn độc đáo và hàm lượng caffeine cao hơn.',
            'prod_featured'=>'yes',
            'prod_discount'=>0,
            'prod_cate'=>1
        ]);
        Product::create([
            'prod_name'=>'Guatemala',
            'prod_price'=>14.00,
            'prod_quantity'=>10,
            'prod_description'=>'Được chứng nhận thương mại công bằng với thân nặng, độ chua nhẹ của quả mọng khô và vị ngọt marshmallow.',
            'prod_featured'=>'no',
            'prod_discount'=>0,
            'prod_cate'=>1
        ]);
        Product::create([
            'prod_name'=>'Jamaican Island',
            'prod_price'=>13.00,
            'prod_quantity'=>10,
            'prod_description'=>'Caramel mịn và vani với ghi chú của kahlua.',
            'prod_featured'=>'no',
            'prod_discount'=>0,
            'prod_cate'=>1
        ]);
        Product::create([
            'prod_name'=>'French Roast',
            'prod_price'=>18.00,
            'prod_quantity'=>10,
            'prod_description'=>"Hương vị đặc trưng và đặc tính cà phê đậm đà của French Roast đến từ quá trình rang lâu hơn, nóng hơn, điều mà không phải loại hạt nào cũng có thể làm được.",
            'prod_featured'=>'yes',
            'prod_discount'=>0,
            'prod_cate'=>2
        ]);
        Product::create([
            'prod_name'=>'Holiday Blend',
            'prod_price'=>19.00,
            'prod_quantity'=>10,
            'prod_description'=>"Holiday Blend là một truyền thống thú vị đối với chúng tôi cũng như đối với những người uống trung thành luôn nhiệt tình chờ đợi mỗi năm.",
            'prod_featured'=>'no',
            'prod_discount'=>0,
            'prod_cate'=>2
        ]);
        Product::create([
            'prod_name'=>'Uzuri Blend',
            'prod_price'=>19.00,
            'prod_quantity'=>10,
            'prod_description'=>"Trên thực tế, chính những người nông dân đã đặt tên cho sự pha trộn châu Phi thực sự bền vững, rõ ràng này, Uzuri - là tiếng Swahili có nghĩa là đẹp hoặc tuyệt vời.",
            'prod_featured'=>'no',
            'prod_discount'=>0,
            'prod_cate'=>2
        ]);
        Product::create([
            'prod_name'=>'Project X',
            'prod_price'=>15.00,
            'prod_quantity'=>10,
            'prod_description'=>"Chúng tôi hợp tác với Hogsalt để phát triển hỗn hợp độc quyền này, thường chỉ có ở các địa điểm của Hogsalt như Sawada Coffee, Donut Vault và CC Ferns.",
            'prod_featured'=>'yes',
            'prod_discount'=>0,
            'prod_cate'=>3
        ]);
        Product::create([
            'prod_name'=>'CJB Blend',
            'prod_price'=>15.00,
            'prod_quantity'=>10,
            'prod_description'=>"Bao gồm các loại cà phê Công bằng theo mùa và cà phê được chứng nhận Hữu cơ từ Trung và Nam Mỹ, Cafe Jumping Bean Blend mịn và ngọt ngào như sô cô la sữa với một chút trái cây nhiệt đới ở phần cuối.",
            'prod_featured'=>'no',
            'prod_discount'=>0,
            'prod_cate'=>3
        ]);
        Product::create([
            'prod_name'=>'Yolk Roast',
            'prod_price'=>15.00,
            'prod_quantity'=>10,
            'prod_description'=>"Yolk Roast Coffee khác xa với sự pha trộn bữa sáng thông thường của bạn. Chúng tôi đã phát triển hỗn hợp cà phê Ethiopia độc quyền này dành riêng cho các đối tác của chúng tôi tại Yolk.",
            'prod_featured'=>'no',
            'prod_discount'=>0,
            'prod_cate'=>3
        ]);
    }
}
