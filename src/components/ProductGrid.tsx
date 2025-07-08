import { Card, CardContent, CardFooter } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Star, ShoppingCart, Heart, Eye } from "lucide-react";
import { useState } from "react";
import { useNavigate } from "react-router-dom";

interface ProductGridProps {
  selectedCategory: string;
  sortBy: string;
}

export const ProductGrid = ({ selectedCategory, sortBy }: ProductGridProps) => {
  const [likedProducts, setLikedProducts] = useState<number[]>([]);
  const navigate = useNavigate();

  const allProducts = [
    {
      id: 1,
      name: "Premium Wireless Headphones",
      price: 299,
      originalPrice: 399,
      rating: 4.8,
      reviews: 124,
      image: "bg-gradient-to-br from-slate-200 to-slate-300",
      category: "electronics",
      badge: "Best Seller"
    },
    {
      id: 2,
      name: "Smart Fitness Watch",
      price: 249,
      originalPrice: 329,
      rating: 4.9,
      reviews: 89,
      image: "bg-gradient-to-br from-blue-200 to-blue-300",
      category: "electronics",
      badge: "New"
    },
    {
      id: 3,
      name: "Designer Cotton T-Shirt",
      price: 49,
      originalPrice: 69,
      rating: 4.6,
      reviews: 156,
      image: "bg-gradient-to-br from-green-200 to-green-300",
      category: "fashion",
      badge: "Sale"
    },
    {
      id: 4,
      name: "Professional Camera Lens",
      price: 599,
      originalPrice: 749,
      rating: 4.9,
      reviews: 203,
      image: "bg-gradient-to-br from-gray-200 to-gray-300",
      category: "electronics",
      badge: "Pro"
    },
    {
      id: 5,
      name: "Luxury Sunglasses",
      price: 189,
      originalPrice: 249,
      rating: 4.6,
      reviews: 78,
      image: "bg-gradient-to-br from-rose-200 to-rose-300",
      category: "fashion",
      badge: "Trending"
    },
    {
      id: 6,
      name: "Modern Table Lamp",
      price: 89,
      originalPrice: 119,
      rating: 4.7,
      reviews: 92,
      image: "bg-gradient-to-br from-yellow-200 to-yellow-300",
      category: "home",
      badge: "Popular"
    }
  ];

  const filteredProducts = selectedCategory === "all" 
    ? allProducts 
    : allProducts.filter(product => product.category === selectedCategory);

  const sortedProducts = [...filteredProducts].sort((a, b) => {
    switch (sortBy) {
      case "price-low":
        return a.price - b.price;
      case "price-high":
        return b.price - a.price;
      case "rating":
        return b.rating - a.rating;
      default:
        return a.name.localeCompare(b.name);
    }
  });

  const toggleLike = (productId: number) => {
    setLikedProducts(prev => 
      prev.includes(productId) 
        ? prev.filter(id => id !== productId)
        : [...prev, productId]
    );
  };

  const handleProductClick = (productId: number) => {
    navigate(`/product/${productId}`);
  };

  return (
    <div>
      <div className="flex justify-between items-center mb-8">
        <h2 className="text-2xl font-bold text-gray-900">
          {selectedCategory === "all" ? "All Products" : `${selectedCategory.charAt(0).toUpperCase() + selectedCategory.slice(1)} Products`}
        </h2>
        <p className="text-gray-600">{sortedProducts.length} products found</p>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {sortedProducts.map((product) => (
          <Card key={product.id} className="group hover:shadow-xl transition-all duration-300 border-0 bg-white/80 backdrop-blur-sm overflow-hidden cursor-pointer">
            <div className="relative" onClick={() => handleProductClick(product.id)}>
              <div className={`aspect-square ${product.image} relative overflow-hidden`}>
                <div className="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors duration-300"></div>
                <Badge className="absolute top-4 left-4 bg-blue-500 text-white border-0">
                  {product.badge}
                </Badge>
                
                <div className="absolute top-4 right-4 flex flex-col space-y-2">
                  <Button
                    variant="ghost"
                    size="sm"
                    className={`h-8 w-8 rounded-full bg-white/90 hover:bg-white transition-colors ${
                      likedProducts.includes(product.id) ? 'text-red-500' : 'text-gray-600'
                    }`}
                    onClick={(e) => {
                      e.stopPropagation();
                      toggleLike(product.id);
                    }}
                  >
                    <Heart className={`h-4 w-4 ${likedProducts.includes(product.id) ? 'fill-current' : ''}`} />
                  </Button>
                  <Button
                    variant="ghost"
                    size="sm"
                    className="h-8 w-8 rounded-full bg-white/90 hover:bg-white transition-colors text-gray-600"
                    onClick={(e) => {
                      e.stopPropagation();
                      handleProductClick(product.id);
                    }}
                  >
                    <Eye className="h-4 w-4" />
                  </Button>
                </div>
              </div>
            </div>
            
            <CardContent className="p-6" onClick={() => handleProductClick(product.id)}>
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
              </div>
            </CardContent>

            <CardFooter className="p-6 pt-0">
              <Button 
                className="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white group"
                onClick={(e) => {
                  e.stopPropagation();
                  // Add to cart functionality
                }}
              >
                <ShoppingCart className="mr-2 h-4 w-4 group-hover:scale-110 transition-transform" />
                Add to Cart
              </Button>
            </CardFooter>
          </Card>
        ))}
      </div>
    </div>
  );
};
