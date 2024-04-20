import { Button, buttonVariants } from '@/components/ui/button';
import{
    Card,
    CardHeader,
    CardTitle,
    CardDescription,
    CardContent,
    CardFooter,
} from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useState } from 'react';
import Link from 'next/link';

export default function LoginForm(){
    return <Card className="w-[350px]">
    <CardHeader>
      <CardTitle>Login</CardTitle>
      <CardDescription>Insira os dados para login</CardDescription>
    </CardHeader>
    <CardContent>
      <form>
        <div className="grid w-full items-center gap-4">
          <div className="flex flex-col space-y-1.5">
          </div>
          <div className="flex flex-col space-y-1.5">
            <Label htmlFor="email">e-mail</Label>
            <Input id="email" name="email" required />
          </div>
          <div className="flex flex-col space-y-1.5">
            <Label htmlFor="password">senha</Label>
            <Input id="password" name="password" required />
          </div>
          <div className="flex flex-col space-y-1.5">
            <Label htmlFor="framework"></Label>
          </div>
        </div>
      </form>
    </CardContent>
    <CardFooter className="flex justify-between">
      <Button variant="outline">Cancel</Button>
      <Button>Entrar</Button>
      <Link href="/portal/cadastro" className={buttonVariants({ variant: 'link'})}>
         Criar Conta</Link>
    </CardFooter>
  </Card>
}