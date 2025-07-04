
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Separator } from "@/components/ui/separator";
import { Badge } from "@/components/ui/badge";
import { Slider } from "@/components/ui/slider";
import { Star } from "lucide-react";
import { useState } from "react";

interface ProductFilterProps {
  selectedCategory: string;
  setSelectedCategory: (category: string) => void;
  sortBy: string;
  setSortBy: (sort: string) => void;
}

export const ProductFilter = ({ 
  selectedCategory, 
  setSelectedCategory, 
  sortBy, 
  setSortBy 
}: ProductFilterProps) => {
  const [priceRange, setPriceRange] = useState([0, 1000]);

  const categories = [
    { id: "all", name: "All Products", count: 156 },
    { id: "electronics", name: "Electronics", count: 45 },
    { id: "fashion", name: "Fashion", count: 67 },
    { id: "home", name: "Home & Garden", count: 23 },
    { id: "sports", name: "Sports", count: 21 }
  ];

  const sortOptions = [
    { id: "name", name: "Name (A-Z)" },
    { id: "price-low", name: "Price: Low to High" },
    { id: "price-high", name: "Price: High to Low" },
    { id: "rating", name: "Highest Rated" }
  ];

  const ratings = [5, 4, 3, 2, 1];

  return (
    <div className="space-y-6">
      <Card className="border-0 bg-white/80 backdrop-blur-sm">
        <CardHeader>
          <CardTitle className="text-lg">Categories</CardTitle>
        </CardHeader>
        <CardContent className="space-y-2">
          {categories.map((category) => (
            <Button
              key={category.id}
              variant={selectedCategory === category.id ? "default" : "ghost"}
              className={`w-full justify-between ${
                selectedCategory === category.id 
                  ? "bg-gradient-to-r from-blue-600 to-purple-600 text-white" 
                  : "hover:bg-gray-100"
              }`}
              onClick={() => setSelectedCategory(category.id)}
            >
              <span>{category.name}</span>
              <Badge variant="outline" className="ml-2">
                {category.count}
              </Badge>
            </Button>
          ))}
        </CardContent>
      </Card>

      <Card className="border-0 bg-white/80 backdrop-blur-sm">
        <CardHeader>
          <CardTitle className="text-lg">Sort By</CardTitle>
        </CardHeader>
        <CardContent className="space-y-2">
          {sortOptions.map((option) => (
            <Button
              key={option.id}
              variant={sortBy === option.id ? "default" : "ghost"}
              className={`w-full justify-start ${
                sortBy === option.id 
                  ? "bg-gradient-to-r from-blue-600 to-purple-600 text-white" 
                  : "hover:bg-gray-100"
              }`}
              onClick={() => setSortBy(option.id)}
            >
              {option.name}
            </Button>
          ))}
        </CardContent>
      </Card>

      <Card className="border-0 bg-white/80 backdrop-blur-sm">
        <CardHeader>
          <CardTitle className="text-lg">Price Range</CardTitle>
        </CardHeader>
        <CardContent>
          <div className="space-y-4">
            <Slider
              value={priceRange}
              onValueChange={setPriceRange}
              max={1000}
              min={0}
              step={10}
              className="w-full"
            />
            <div className="flex justify-between text-sm text-gray-600">
              <span>${priceRange[0]}</span>
              <span>${priceRange[1]}</span>
            </div>
          </div>
        </CardContent>
      </Card>

      <Card className="border-0 bg-white/80 backdrop-blur-sm">
        <CardHeader>
          <CardTitle className="text-lg">Customer Rating</CardTitle>
        </CardHeader>
        <CardContent className="space-y-2">
          {ratings.map((rating) => (
            <Button
              key={rating}
              variant="ghost"
              className="w-full justify-start hover:bg-gray-100"
            >
              <div className="flex items-center space-x-2">
                <div className="flex items-center">
                  {[...Array(5)].map((_, i) => (
                    <Star 
                      key={i} 
                      className={`h-4 w-4 ${
                        i < rating 
                          ? 'fill-yellow-400 text-yellow-400' 
                          : 'text-gray-300'
                      }`} 
                    />
                  ))}
                </div>
                <span className="text-sm text-gray-600">& up</span>
              </div>
            </Button>
          ))}
        </CardContent>
      </Card>
    </div>
  );
};
