
import { useState, useEffect } from "react";
import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Separator } from "@/components/ui/separator";
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { Badge } from "@/components/ui/badge";
import { useNavigate } from "react-router-dom";
import { User, Mail, Phone, MapPin, Calendar, ShoppingBag } from "lucide-react";
import { useToast } from "@/hooks/use-toast";

const Profile = () => {
  const [userEmail, setUserEmail] = useState("");
  const [isEditing, setIsEditing] = useState(false);
  const [formData, setFormData] = useState({
    name: "John Doe",
    email: "",
    phone: "+62 812 3456 7890",
    address: "Jl. Sudirman No. 123, Jakarta",
    joinDate: "Januari 2024",
  });
  const navigate = useNavigate();
  const { toast } = useToast();

  useEffect(() => {
    const isLoggedIn = localStorage.getItem("isLoggedIn");
    const email = localStorage.getItem("userEmail");
    
    if (!isLoggedIn) {
      navigate("/login");
      return;
    }
    
    if (email) {
      setUserEmail(email);
      setFormData(prev => ({ ...prev, email }));
    }
  }, [navigate]);

  const handleSave = () => {
    setIsEditing(false);
    toast({
      title: "Profil Diperbarui",
      description: "Informasi profil Anda berhasil disimpan",
    });
  };

  const recentOrders = [
    { id: "ORD-001", date: "15 Des 2024", items: 3, total: "Rp 1.250.000", status: "Dikirim" },
    { id: "ORD-002", date: "10 Des 2024", items: 1, total: "Rp 350.000", status: "Selesai" },
    { id: "ORD-003", date: "5 Des 2024", items: 2, total: "Rp 750.000", status: "Selesai" },
  ];

  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
      <Header />
      <div className="container mx-auto px-4 py-12">
        <div className="max-w-4xl mx-auto">
          <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {/* Profile Info */}
            <div className="lg:col-span-2">
              <Card className="shadow-2xl border-0 bg-white/90 backdrop-blur-sm">
                <CardHeader>
                  <div className="flex items-center justify-between">
                    <div>
                      <CardTitle className="text-2xl font-bold text-gray-900">
                        Profil Saya
                      </CardTitle>
                      <CardDescription>
                        Kelola informasi profil Anda
                      </CardDescription>
                    </div>
                    <Button
                      onClick={() => isEditing ? handleSave() : setIsEditing(true)}
                      variant={isEditing ? "default" : "outline"}
                    >
                      {isEditing ? "Simpan" : "Edit Profil"}
                    </Button>
                  </div>
                </CardHeader>
                <CardContent className="space-y-6">
                  <div className="flex items-center space-x-4">
                    <Avatar className="h-20 w-20">
                      <AvatarImage src="/placeholder.svg" alt="Profile" />
                      <AvatarFallback className="text-lg font-semibold bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                        {formData.name.split(' ').map(n => n[0]).join('')}
                      </AvatarFallback>
                    </Avatar>
                    <div>
                      <h3 className="text-xl font-semibold text-gray-900">{formData.name}</h3>
                      <p className="text-gray-600">{formData.email}</p>
                      <Badge variant="secondary" className="mt-1">
                        Member Premium
                      </Badge>
                    </div>
                  </div>

                  <Separator />

                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="name" className="flex items-center gap-2">
                        <User className="h-4 w-4" />
                        Nama Lengkap
                      </Label>
                      <Input
                        id="name"
                        value={formData.name}
                        onChange={(e) => setFormData(prev => ({ ...prev, name: e.target.value }))}
                        disabled={!isEditing}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="email" className="flex items-center gap-2">
                        <Mail className="h-4 w-4" />
                        Email
                      </Label>
                      <Input
                        id="email"
                        type="email"
                        value={formData.email}
                        onChange={(e) => setFormData(prev => ({ ...prev, email: e.target.value }))}
                        disabled={!isEditing}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="phone" className="flex items-center gap-2">
                        <Phone className="h-4 w-4" />
                        Nomor Telepon
                      </Label>
                      <Input
                        id="phone"
                        value={formData.phone}
                        onChange={(e) => setFormData(prev => ({ ...prev, phone: e.target.value }))}
                        disabled={!isEditing}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="joinDate" className="flex items-center gap-2">
                        <Calendar className="h-4 w-4" />
                        Bergabung Sejak
                      </Label>
                      <Input
                        id="joinDate"
                        value={formData.joinDate}
                        disabled
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="address" className="flex items-center gap-2">
                      <MapPin className="h-4 w-4" />
                      Alamat
                    </Label>
                    <Input
                      id="address"
                      value={formData.address}
                      onChange={(e) => setFormData(prev => ({ ...prev, address: e.target.value }))}
                      disabled={!isEditing}
                    />
                  </div>
                </CardContent>
              </Card>
            </div>

            {/* Recent Orders */}
            <div>
              <Card className="shadow-2xl border-0 bg-white/90 backdrop-blur-sm">
                <CardHeader>
                  <CardTitle className="flex items-center gap-2">
                    <ShoppingBag className="h-5 w-5" />
                    Pesanan Terbaru
                  </CardTitle>
                </CardHeader>
                <CardContent>
                  <div className="space-y-4">
                    {recentOrders.map((order) => (
                      <div key={order.id} className="p-4 border rounded-lg">
                        <div className="flex justify-between items-start mb-2">
                          <div>
                            <p className="font-semibold text-sm">{order.id}</p>
                            <p className="text-xs text-gray-600">{order.date}</p>
                          </div>
                          <Badge variant={order.status === "Selesai" ? "default" : "secondary"}>
                            {order.status}
                          </Badge>
                        </div>
                        <div className="text-sm text-gray-600">
                          <p>{order.items} item - {order.total}</p>
                        </div>
                      </div>
                    ))}
                  </div>
                </CardContent>
              </Card>
            </div>
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default Profile;
