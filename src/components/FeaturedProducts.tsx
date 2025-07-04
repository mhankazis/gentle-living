
import { Card, CardContent, CardFooter } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Star, ShoppingCart, Heart } from "lucide-react";
import { useState } from "react";

export const FeaturedProducts = () => {
  const [likedProducts, setLikedProducts] = useState<number[]>([]);

  const products = [
    {
      id: 1,
      name: "Premium Wireless Headphones",
      price: 299,
      originalPrice: 399,
      rating: 4.8,
      reviews: 124,
      image: "bg-gradient-to-br from-slate-200 to-slate-300",
      badge: "Best Seller",
      badgeColor: "bg-green-500"
    },
    {
      id: 2,
      name: "Smart Fitness Watch",
      price: 249,
      originalPrice: 329,
      rating: 4.9,
      reviews: 89,
      image: "bg-gradient-to-br from-blue-200 to-blue-300",
      badge: "New",
      badgeColor: "bg-blue-500"
    },
    {
      id: 3,
      name: "Designer Leather Wallet",
      price: 79,
      originalPrice: 99,
      rating: 4.7,
      reviews: 56,
      image: "bg-gradient-to-br from-amber-200 to-amber-300",
      badge: "Sale",
      badgeColor: "bg-red-500"
    },
    {
      id: 4,
      name: "Professional Camera Lens",
      price: 599,
      originalPrice: 749,
      rating: 4.9,
      reviews: 203,
      image: "bg-gradient-to-br from-gray-200 to-gray-300",
      badge: "Pro",
      badgeColor: "bg-purple-500"
    },
    {
      id: 5,
      name: "Luxury Sunglasses",
      price: 189,
      originalPrice: 249,
      rating: 4.6,
      reviews: 78,
      image: "bg-gradient-to-br from-rose-200 to-rose-300",
      badge: "Trending",
      badgeColor: "bg-pink-500"
    },
    {
      id: 6,
      name: "Gaming Mechanical Keyboard",
      price: 149,
      originalPrice: 199,
      rating: 4.8,
      reviews: 167,
      image: "bg-gradient-to-br from-cyan-200 to-cyan-300",
      badge: "Popular",
      badgeColor: "bg-cyan-500"
    }
  ];

  const toggleLike = (productId: number) => {
    setLikedProducts(prev => 
      prev.includes(productId) 
        ? prev.filter(id => id !== productId)
        : [...prev, productId]
    );
  };

  return (
    <section className="py-20">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="text-4xl font-bold text-gray-900 mb-4">Featured Products</h2>
          <p className="text-xl text-gray-600 max-w-2xl mx-auto">
            Handpicked premium products that define quality and style
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {products.map((product) => (
            <Card key={product.id} className="group hover:shadow-2xl transition-all duration-300 border-0 bg-white/80 backdrop-blur-sm overflow-hidden">
              <div className="relative">
                <div className={`aspect-square ${product.image} relative overflow-hidden`}>
                  <div className="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors duration-300"></div>
                  <Badge 
                    className={`absolute top-4 left-4 ${product.badgeColor} text-white border-0`}
                  >
                    {product.badge}
                  </Badge>
                  <Button
                    variant="ghost"
                    size="sm"
                    className={`absolute top-4 right-4 h-8 w-8 rounded-full bg-white/90 hover:bg-white transition-colors ${
                      likedProducts.includes(product.id) ? 'text-red-500' : 'text-gray-600'
                    }`}
                    onClick={() => toggleLike(product.id)}
                  >
                    <Heart className={`h-4 w-4 ${likedProducts.includes(product.id) ? 'fill-current' : ''}`} />
                  </Button>
                </div>
              </div>
              
              <CardContent className="p-6">
                <h3 className="font-semibold text-lg text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                  {product.name}
                </h3>
                
                <div className="flex items-center space-x-2 mb-3">
                  <div className="flex items-center">
                    {[...Array(5)].map((_, i) => (
                      <Star 
                        key={i} 
                        className={`h-4 w-4 ${
                          i < Math.floor(product.rating) 
                            ? 'fill-yellow-400 text-yellow-400' 
                            : 'text-gray-300'
                        }`} 
                      />
                    ))}
                  </div>
                  <span className="text-sm text-gray-600">({product.reviews})</span>
                </div>

                <div className="flex items-center space-x-2">
                  <span className="text-2xl font-bold text-gray-900">${product.price}</span>
                  <span className="text-lg text-gray-500 line-through">${product.originalPrice}</span>
                  <Badge variant="outline" className="text-green-600 border-green-200">
                    Save ${product.originalPrice - product.price}
                  </Badge>
                </div>
              </CardContent>

              <CardFooter className="p-6 pt-0">
                <Button className="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white group">
                  <ShoppingCart className="mr-2 h-4 w-4 group-hover:scale-110 transition-transform" />
                  Add to Cart
                </Button>
              </CardFooter>
            </Card>
          ))}
        </div>
      </div>
    </section>
  );
};
